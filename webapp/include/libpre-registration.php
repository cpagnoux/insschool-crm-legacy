<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/connection.php';
include_once 'include/error.php';

include_once 'include/libentity.php';

/*
 * Dynamic table for lessons
 */
function display_rooms($link)
{
	$query = 'SELECT name FROM room ORDER BY room_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$num_rooms = 0;

	echo '    <tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '      <th><b>' . $row['name'] . '</b></th>' . PHP_EOL;
		$num_rooms++;
	}

	echo '    </tr>' . PHP_EOL;

	mysqli_free_result($result);

	return $num_rooms;
}

function display_day($day, $count)
{
	echo '    <tr>' . PHP_EOL;

	for ($i = 0; $i < $count; $i++)
		echo '      <th><b>' . $day . '</b></th>' . PHP_EOL;

	echo '    </tr>' . PHP_EOL;
}

function get_time_slots($link, $day)
{
	$query = 'SELECT DISTINCT start_time, end_time FROM lesson ' .
		 'WHERE day = "' . $day . '" ORDER BY start_time, end_time';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$time_slots = array();

	while ($row = mysqli_fetch_assoc($result))
		$time_slots[] = $row['start_time'] . ' - ' . $row['end_time'];

	mysqli_free_result($result);

	return $time_slots;
}

function get_rooms($link)
{
	$query = 'SELECT room_id FROM room ORDER BY room_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$rooms = array();

	while ($row = mysqli_fetch_assoc($result))
		$rooms[] = $row['room_id'];

	mysqli_free_result($result);

	return $rooms;
}

function display_day_lessons($link, $day, $lessons)
{
	$time_slots = get_time_slots($link, $day);
	$rooms = get_rooms($link);

	$query = 'SELECT lesson_id, title, start_time, end_time, room_id ' .
		 'FROM lesson WHERE day = "' . $day .
		 '" ORDER BY start_time, end_time, room_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	foreach ($time_slots as $time_slot) {
		echo '    <tr>' . PHP_EOL;

		foreach ($rooms as $room) {
			if ($row['start_time'] . ' - ' . $row['end_time'] ==
			    $time_slot && $row['room_id'] == $room) {
				echo '      <td><input type="checkbox" name="' .
				     $row['lesson_id'] . '" value="' .
				     $row['title'] . '"' .
				     $lessons[$row['lesson_id']] . '> ' .
				     $row['title'] . ' : ' .
				     $row['start_time'] . ' - ' .
				     $row['end_time'] . '</td>' . PHP_EOL;
				$row = mysqli_fetch_assoc($result);
			} else {
				echo '      <td>---</td>' . PHP_EOL;
			}
		}

		echo '    </tr>' . PHP_EOL;
	}

	mysqli_free_result($result);
}

function display_lessons($lessons)
{
	$link = connect_ins_school();

	echo '  <table>' . PHP_EOL;

	$num_rooms = display_rooms($link);
	$days = array('LUNDI', 'MARDI', 'MERCREDI', 'JEUDI', 'VENDREDI');

	foreach($days as $day) {
		display_day($day, $num_rooms);
		display_day_lessons($link, $day, $lessons);
	}

	echo '  </table>' . PHP_EOL;

	mysqli_close($link);
}

/*
 * Misc
 */
function display_warnings()
{
	echo '  <p>* Attention : Lors des cours à INS School, merci ' .
	     'd\'utiliser des chaussures propres dans les salles de danse ' .
	     '(non utilisées à l\'extérieur) et une tenue confortable.<br>' .
	     PHP_EOL;
	echo '     * INS School se réserve le droit de modifier les horaires ' .
	     'du planning à tout moment.</p>' . PHP_EOL;
}

function display_info()
{
	echo '  Documents à fournir :' . PHP_EOL;
	echo '  <ul>' . PHP_EOL;
	echo '    <li>1 certificat médical</li>' . PHP_EOL;
	echo '    <li>2 photos d\'identité</li>' . PHP_EOL;
	echo '    <li>1 attestation d\'assurance</li>' . PHP_EOL;
	echo '    <li>1 enveloppe timbrée (au nom et adresse de l\'adhérent ' .
	     'ou des parents pour les mineurs)</li>' . PHP_EOL;
	echo '    <li>Le règlement du forfait (possibilité de payer en trois ' .
	     'fois sans frais)</li>' . PHP_EOL;
	echo '  </ul>' . PHP_EOL;
	echo '  Le règlement intérieur doit être signé et retourné lors de ' .
	     'l\'inscription.<br>' . PHP_EOL;
}

function lessons_to_string($lessons, $display)
{
	$string = '';

	foreach ($lessons as $lesson_id => $title) {
		if (is_int($lesson_id) && isset($title)) {
			if ($display)
				echo '  <li>' . $title . '</li>' . PHP_EOL;
			$string .= $lesson_id . ';';
		}
	}

	return $string;
}

function string_to_lessons($string)
{
	$lessons = array();

	while (strlen($string) > 0) {
		sscanf($string, '%d', $id);
		$lessons[$id] = ' checked="checked"';
		$string = substr($string, strlen($id) + 1);
	}

	return $lessons;
}

/*
 * Pre-registration form
 */
function display_pre_registration_form()
{
	echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">' .
	     PHP_EOL;

	form_entity_pre_registration();

	echo '</form>' . PHP_EOL;
}

/*
 * Submission of pre-registration
 */
function display_summary($data)
{
	echo '<h2>Récapitulatif :</h2>' . PHP_EOL;

	echo '<b>Nom :</b> ' . $data['last_name'] . '<br>' . PHP_EOL;
	echo '<b>Prénom :</b> ' . $data['first_name'] . '<br>' . PHP_EOL;
	echo '<b>Date de naissance :</b> ' . $data['birth_date'] . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Adresse :</b> ' . $data['adress'] . '<br>' . PHP_EOL;
	echo '<b>Code postal :</b> ' . $data['postal_code'] . '<br>' . PHP_EOL;
	echo '<b>Ville :</b> ' . $data['city'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Portable :</b> ' . $data['cellphone'] . '<br>' . PHP_EOL;
	echo '<b>Portable père :</b> ' . $data['cellphone_father'] . '<br>' .
	     PHP_EOL;
	echo '<b>Portable mère :</b> ' . $data['cellphone_mother'] . '<br>' .
	     PHP_EOL;
	echo '<b>Téléphone fixe :</b> ' . $data['phone'] . '<br>' . PHP_EOL;
	echo '<b>E-mail :</b> ' . $data['email'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo 'Vous avez choisi les cours :' . PHP_EOL;
	echo '<ul>' . PHP_EOL;

	$lessons_str = lessons_to_string($data, true);

	echo '</ul>' . PHP_EOL;

	return $lessons_str;
}

function insert_into_database($data, $lessons_str)
{
	$link = connect_ins_school();

	$query = 'INSERT INTO pre_registration VALUES ("", "' .
		 $data['first_name'] . '", "' . $data['last_name'] . '", "' .
		 $data['birth_date'] . '", "' . $data['adress'] . '", "' .
		 $data['postal_code'] . '", "' . $data['city'] . '", "' .
		 $data['cellphone'] . '", "' . $data['cellphone_father'] .
		 '", "' . $data['cellphone_mother'] . '", "' . $data['phone'] .
		 '", "' . $data['email'] . '", "' . $lessons_str . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);
}
?>

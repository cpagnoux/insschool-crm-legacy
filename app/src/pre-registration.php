<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/entity.php';
require_once 'src/entity_helper.php';

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

	echo '  <tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		$row = html_encode_strings($row);

		echo '    <th class="uppercase">' . $row['name'] . '</th>' .
		     PHP_EOL;

		$num_rooms++;
	}

	echo '  </tr>' . PHP_EOL;

	mysqli_free_result($result);

	return $num_rooms;
}

function display_day($day, $count)
{
	echo '  <tr>' . PHP_EOL;

	for ($i = 0; $i < $count; $i++)
		echo '    <th class="uppercase">' . eval_enum($day) . '</th>' .
		     PHP_EOL;

	echo '  </tr>' . PHP_EOL;
}

function get_start_times($link, $day)
{
	$query = 'SELECT DISTINCT start_time FROM lesson WHERE day = "' . $day .
		 '" ORDER BY start_time';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$start_times = array();

	while ($row = mysqli_fetch_assoc($result))
		$start_times[] = $row['start_time'];

	mysqli_free_result($result);

	return $start_times;
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

function display_lesson($row, $start_time, $room, $lessons)
{
	if ($row['start_time'] != $start_time || $row['room_id'] != $room) {
		echo '    <td class="centered">---</td>' . PHP_EOL;
		return false;
	}

	echo '    <td>' . PHP_EOL;
	echo '      <input id="' . $row['lesson_id'] .
	     '" type="checkbox" name="' . $row['lesson_id'] . '" value="' .
	     $row['title'] . '"' . $lessons[$row['lesson_id']] . '>' . PHP_EOL;
	echo '      <label for="' . $row['lesson_id'] . '">' . $row['title'] .
	     ' : ' . format_time($row['start_time']) . ' - ' .
	     format_time($row['end_time']) . '</label>' . PHP_EOL;
	echo '    </td>' . PHP_EOL;

	return true;
}

function display_lessons_by_day($link, $day, $lessons)
{
	$start_times = get_start_times($link, $day);
	$rooms = get_rooms($link);

	$query = 'SELECT lesson_id, title, start_time, end_time, room_id ' .
		 'FROM lesson WHERE day = "' . $day .
		 '" ORDER BY start_time, end_time, room_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);
	$row = html_encode_strings($row);

	foreach ($start_times as $start_time) {
		echo '  <tr>' . PHP_EOL;

		foreach ($rooms as $room) {
			if (display_lesson($row, $start_time, $room,
					   $lessons)) {
				$row = mysqli_fetch_assoc($result);
				$row = html_encode_strings($row);
			}
		}

		echo '  </tr>' . PHP_EOL;
	}

	mysqli_free_result($result);
}

function display_lessons($lessons)
{
	$link = connect_database();

	echo '<table>' . PHP_EOL;

	$num_rooms = display_rooms($link);
	$days = array('MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY');

	foreach($days as $day) {
		display_day($day, $num_rooms);
		display_lessons_by_day($link, $day, $lessons);
	}

	echo '</table>' . PHP_EOL;

	mysqli_close($link);
}

/*
 * Miscellaneous functions
 */
function chosen_lessons($lessons_str)
{
	$string = '';

	while (strlen($lessons_str) > 0) {
		if ($string != '')
			$string .= ', ';

		sscanf($lessons_str, '%d', $lesson_id);
		$string .= get_lesson_title($lesson_id);
		$lessons_str = substr($lessons_str, strlen($lesson_id) + 1);
	}

	return $string;
}

function lessons_to_string($lessons, $display = false)
{
	$string = '';

	foreach ($lessons as $lesson_id => $title) {
		if (is_int($lesson_id) && isset($title)) {
			if ($string != '')
				$string .= ',';

			$string .= $lesson_id;

			if ($display)
				echo '  <li>' . $title . '</li>' . PHP_EOL;
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
 * Submission of pre-registration
 */
function display_pre_registration_summary($data)
{
	require 'views/pre_registration_summary.html.php';

	return $lessons_str;
}

function save_pre_registration($data, $lessons_str)
{
	$link = connect_database();

	$query = 'INSERT INTO pre_registration VALUES ("", "' .
		 $data['first_name'] . '", "' . $data['last_name'] . '", "' .
		 to_date($data['bd_day'], $data['bd_month'], $data['bd_year']) .
		 '", "' . $data['address'] . '", "' . $data['postal_code'] .
		 '", "' . $data['city'] . '", "' .
		 format_phone_number($data['cellphone']) . '", "' .
		 format_phone_number($data['cellphone_father']) . '", "' .
		 format_phone_number($data['cellphone_mother']) . '", "' .
		 format_phone_number($data['phone']) . '", "' . $data['email'] .
		 '", "' . $lessons_str . '", "' . $data['plan'] . '",  "' .
		 $data['means_of_knowledge'] . '", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);
}

/*
 * Commit of pre-registration
 */
function add_member_from_pr($link, $row)
{
	$query = 'INSERT INTO member VALUES ("", "' . $row['first_name'] .
		 '", "' . $row['last_name'] . '", "' . $row['birth_date'] .
		 '", "' . $row['address'] . '", "' . $row['postal_code'] .
		 '", "' . $row['city'] . '", "' . $row['cellphone'] . '", "' .
		 $row['cellphone_father'] . '", "' . $row['cellphone_mother'] .
		 '", "' . $row['phone'] . '", "' . $row['email'] . '", "' .
		 $row['means_of_knowledge'] . '", "", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function get_member_id_or_add($link, $row)
{
	$query = 'SELECT member_id FROM member WHERE first_name = "' .
		 $row['first_name'] . '" AND last_name = "' .
		 $row['last_name'] . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	if (mysqli_num_rows($result) == 0) {
		mysqli_free_result($result);
		add_member_from_pr($link, $row);
		return get_member_id_or_add($link, $row);
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);

	return $row['member_id'];
}

function add_registration_detail_from_pr($link, $registration_id, $lesson_id)
{
	$query = 'INSERT INTO registration_detail VALUES ("' .
		 $registration_id . '", "' . $lesson_id . '", "")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function add_registration_from_pr($link, $member_id, $row)
{
	$season = date_to_season($row['date']);

	$query = 'INSERT INTO registration VALUES ("", "' . $member_id .
		 '", "' . $season . '", "' . $row['plan'] .
		 '", "", "", "", "", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$registration_id = get_registration_id_from_info($member_id, $season);
	add_registration_file($link, $registration_id);

	$lessons = string_to_lessons($row['lessons']);

	foreach ($lessons as $lesson_id => $value)
		add_registration_detail_from_pr($link, $registration_id,
						$lesson_id);
}

function commit_pre_registration($pre_registration_id)
{
	$link = connect_database();

	$query = 'SELECT * FROM pre_registration WHERE pre_registration_id = ' .
		 $pre_registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);

	$member_id = get_member_id_or_add($link, $row);
	add_registration_from_pr($link, $member_id, $row);

	mysqli_close($link);

	delete_entity('pre_registration', $pre_registration_id);
	redirect('member', $member_id);
}
?>

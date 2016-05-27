<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/libtable.php';

include_once 'include/connection.php';
include_once 'include/error.php';
include_once 'include/util.php';

function display_table_goody($result, $limit)
{
	echo '<h2>Goodies</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun goodies<br>' . PHP_EOL;
		return;
	}

	display_table_limit('goody', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Désignation</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['name'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('goody', $row['goody_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_lesson($result, $limit)
{
	echo '<h2>Cours</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun cours<br>' . PHP_EOL;
		return;
	}

	display_table_limit('lesson', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Intitulé</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['title'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('lesson', $row['lesson_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_member($result, $limit)
{
	echo '<h2>Adhérents</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun adhérent<br>' . PHP_EOL;
		return;
	}

	display_table_limit('member', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Nom</b></td>' . PHP_EOL;
	echo '    <td><b>Prénom</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['last_name'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['first_name'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('member', $row['member_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_order($result, $limit)
{
	echo '<h2>Commandes</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune commande<br>' . PHP_EOL;
		return;
	}

	display_table_limit('order', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>N° de commande</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['order_id'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('order', $row['order_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_pre_registration($result, $limit)
{
	echo '<h2>Pré-inscriptions</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune pré-inscription<br>' . PHP_EOL;
		return;
	}

	display_table_limit('pre_registration', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Nom</b></td>' . PHP_EOL;
	echo '    <td><b>Prénom</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['last_name'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['first_name'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('pre_registration',
					  $row['pre_registration_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_room($result, $limit)
{
	echo '<h2>Salles</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune salle<br>' . PHP_EOL;
		return;
	}

	display_table_limit('room', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Nom</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['name'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('room', $row['room_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' ; PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_teacher($result, $limit)
{
	echo '<h2>Professeurs</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun professeur<br>' . PHP_EOL;
		return;
	}

	display_table_limit('teacher', $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Nom</b></td>' . PHP_EOL;
	echo '    <td><b>Prénom</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['last_name'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['first_name'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('teacher', $row['teacher_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table($table, $limit, $page)
{
	if (!isset($limit))
		$limit = 25;

	if (!isset($page))
		$page = 1;

	$offset = $limit * ($page - 1);

	$link = connect_ins_school();

	$query = 'SELECT * FROM `' . $table . '` LIMIT ' . $limit . ' OFFSET ' .
		 $offset;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	switch ($table) {
	case 'goody':
		display_table_goody($result, $limit);
		break;
	case 'lesson':
		display_table_lesson($result, $limit);
		break;
	case 'member':
		display_table_member($result, $limit);
		break;
	case 'order':
		display_table_order($result, $limit);
		break;
	case 'pre_registration':
		display_table_pre_registration($result, $limit);
		break;
	case 'room':
		display_table_room($result, $limit);
		break;
	case 'teacher':
		display_table_teacher($result, $limit);
		break;
	}

	mysqli_free_result($result);
	mysqli_close($link);

	echo '<br>' . PHP_EOL;
	display_table_pagination($table, $limit, $page);

	if ($table != 'pre_registration') {
		echo '<br>' . PHP_EOL;
		echo link_add_entity($table) . '<br>' . PHP_EOL;
	}
}
?>

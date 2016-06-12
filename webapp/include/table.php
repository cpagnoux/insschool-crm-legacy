<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/libtable.php';

include_once 'include/connection.php';
include_once 'include/error.php';
include_once 'include/util.php';

function display_table_goody($result, $sorting, $limit)
{
	echo '<h2>Goodies</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun goodies<br>' . PHP_EOL;
		return;
	}

	table_display_options('goody', $sorting, $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>Désignation</b></td>' . PHP_EOL;
	echo '    <td><b>Prix</b></td>' . PHP_EOL;
	echo '    <td><b>Stock</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['name'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['price'] . ' €</td>' . PHP_EOL;
		echo '    <td>' . product_status($row['stock']) . '</td>' .
		     PHP_EOL;
		echo '    <td>' . link_entity('goody', $row['goody_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_lesson($result, $sorting, $limit)
{
	echo '<h2>Cours</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun cours<br>' . PHP_EOL;
		return;
	}

	table_display_options('lesson', $sorting, $limit);
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

function display_table_member($result, $sorting, $limit)
{
	echo '<h2>Adhérents</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun adhérent<br>' . PHP_EOL;
		return;
	}

	table_display_options('member', $sorting, $limit);
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

function display_table_order($result, $sorting, $limit)
{
	echo '<h2>Commandes</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune commande<br>' . PHP_EOL;
		return;
	}

	table_display_options('order', $sorting, $limit);
	echo '<br>' . PHP_EOL;

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <td><b>N° de commande</b></td>' . PHP_EOL;
	echo '    <td><b>Adhérent</b></td>' . PHP_EOL;
	echo '    <td><b>Date</b></td>' . PHP_EOL;
	echo '    <td></td>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['order_id'] . '</td>' . PHP_EOL;
		echo '    <td>' . get_name('member', $row['member_id']) .
		     '</td>' . PHP_EOL;
		echo '    <td>' . $row['date'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('order', $row['order_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_table_pre_registration($result, $sorting, $limit)
{
	echo '<h2>Pré-inscriptions</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune pré-inscription<br>' . PHP_EOL;
		return;
	}

	table_display_options('pre_registration', $sorting, $limit);
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

function display_table_room($result, $sorting, $limit)
{
	echo '<h2>Salles</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune salle<br>' . PHP_EOL;
		return;
	}

	table_display_options('room', $sorting, $limit);
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

function display_table_teacher($result, $sorting, $limit)
{
	echo '<h2>Professeurs</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun professeur<br>' . PHP_EOL;
		return;
	}

	table_display_options('teacher', $sorting, $limit);
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

// FIXME: make display options persistent when changing page
// hint: using $_SESSION variable
function display_table($table, $sorting, $page, $limit)
{
	if (!isset($sorting) && ($table == 'goody' || $table == 'room'))
		$sorting = 'name';
	else if (!isset($sorting) && $table == 'lesson')
		$sorting = 'title';
	else if (!isset($sorting) && $table == 'order')
		$sorting = 'date';
	else if (!isset($sorting))
		$sorting = 'last_name, first_name';

	if (!isset($page))
		$page = 1;

	if (!isset($limit))
		$limit = 25;

	$offset = ($page - 1) * $limit;

	$link = connect_ins_school();

	$query = 'SELECT * FROM `' . $table . '` ORDER BY ' . $sorting .
		 ' LIMIT ' . $offset . ', ' . $limit;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	switch ($table) {
	case 'goody':
		display_table_goody($result, $sorting, $limit);
		break;
	case 'lesson':
		display_table_lesson($result, $sorting, $limit);
		break;
	case 'member':
		display_table_member($result, $sorting, $limit);
		break;
	case 'order':
		display_table_order($result, $sorting, $limit);
		break;
	case 'pre_registration':
		display_table_pre_registration($result, $sorting, $limit);
		break;
	case 'room':
		display_table_room($result, $sorting, $limit);
		break;
	case 'teacher':
		display_table_teacher($result, $sorting, $limit);
		break;
	}

	mysqli_free_result($result);
	mysqli_close($link);

	table_pagination($table, $page, $limit);

	if ($table != 'pre_registration') {
		echo '<br>' . PHP_EOL;
		echo link_add_entity($table) . '<br>' . PHP_EOL;
	}
}
?>

<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'include/libtable.php';

require_once 'include/connection.php';
require_once 'include/error.php';
require_once 'include/util.php';

function display_table_goody($result)
{
	echo 'Goodies<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun goodies<br>' . PHP_EOL;
		return;
	}

	table_display_options('goody');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Désignation</b></th>' . PHP_EOL;
	echo '    <th><b>Prix</b></th>' . PHP_EOL;
	echo '    <th><b>Stock</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table_lesson($result)
{
	echo 'Cours<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun cours<br>' . PHP_EOL;
		return;
	}

	table_display_options('lesson');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Intitulé</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table_member($result)
{
	echo 'Adhérents<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun adhérent<br>' . PHP_EOL;
		return;
	}

	table_display_options('member');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Nom</b></th>' . PHP_EOL;
	echo '    <th><b>Prénom</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table_order($result)
{
	echo 'Commandes<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune commande<br>' . PHP_EOL;
		return;
	}

	table_display_options('order');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>N° de commande</b></th>' . PHP_EOL;
	echo '    <th><b>Adhérent</b></th>' . PHP_EOL;
	echo '    <th><b>Date</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table_pre_registration($result)
{
	echo 'Pré-inscriptions<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune pré-inscription<br>' . PHP_EOL;
		return;
	}

	table_display_options('pre_registration');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Nom</b></th>' . PHP_EOL;
	echo '    <th><b>Prénom</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table_room($result)
{
	echo 'Salles<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune salle<br>' . PHP_EOL;
		return;
	}

	table_display_options('room');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Nom</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table_teacher($result)
{
	echo 'Professeurs<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun professeur<br>' . PHP_EOL;
		return;
	}

	table_display_options('teacher');

	echo '<br>' . PHP_EOL;
	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Nom</b></th>' . PHP_EOL;
	echo '    <th><b>Prénom</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
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

function display_table($table, $page)
{
	if (!isset($_SESSION['goody_sorting']))
		$_SESSION['goody_sorting'] = 'name';
	if (!isset($_SESSION['lesson_sorting']))
		$_SESSION['lesson_sorting'] = 'title';
	if (!isset($_SESSION['order_sorting']))
		$_SESSION['order_sorting'] = 'date';
	if (!isset($_SESSION['person_sorting']))
		$_SESSION['person_sorting'] = 'last_name, first_name';
	if (!isset($_SESSION['room_sorting']))
		$_SESSION['room_sorting'] = 'name';

	if (!isset($_SESSION['limit']))
		$_SESSION['limit'] = 25;

	if (!isset($page))
		$page = 1;

	switch ($table) {
	case 'goody':
		$sorting = $_SESSION['goody_sorting'];
		break;
	case 'lesson':
		$sorting = $_SESSION['lesson_sorting'];
		break;
	case 'order':
		$sorting = $_SESSION['order_sorting'];
		break;
	case 'room':
		$sorting = $_SESSION['room_sorting'];
		break;
	default:
		$sorting = $_SESSION['person_sorting'];
		break;
	}

	$offset = ($page - 1) * $_SESSION['limit'];

	$link = connect_database();

	$query = 'SELECT * FROM `' . $table . '` ORDER BY ' . $sorting .
		 ' LIMIT ' . $offset . ', ' . $_SESSION['limit'];
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	echo link_home() . ' >' . PHP_EOL;

	switch ($table) {
	case 'goody':
		display_table_goody($result);
		break;
	case 'lesson':
		display_table_lesson($result);
		break;
	case 'member':
		display_table_member($result);
		break;
	case 'order':
		display_table_order($result);
		break;
	case 'pre_registration':
		display_table_pre_registration($result);
		break;
	case 'room':
		display_table_room($result);
		break;
	case 'teacher':
		display_table_teacher($result);
		break;
	}

	mysqli_free_result($result);
	mysqli_close($link);

	table_pagination($table, $page);

	if ($table != 'pre_registration') {
		echo '<br>' . PHP_EOL;
		echo link_add_entity($table) . '<br>' . PHP_EOL;
	}
}
?>

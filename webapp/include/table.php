<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/connection.php';
include_once 'include/error.php';
include_once 'include/util.php';

function display_table_goody($result)
{
	echo '<h2>Goodies</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun goodies<br>' . PHP_EOL;
		return;
	}

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

function display_table_lesson($result)
{
	echo '<h2>Cours</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun cours<br>' . PHP_EOL;
		return;
	}

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

function display_table_member($result)
{
	echo '<h2>Adhérents</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun adhérent<br>' . PHP_EOL;
		return;
	}

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

function display_table_order($result)
{
	echo '<h2>Commandes</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune commande<br>' . PHP_EOL;
		return;
	}

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

function display_table_pre_registration($result)
{
	echo '<h2>Pré-inscriptions</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune pré-inscription<br>' . PHP_EOL;
		return;
	}

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

function display_table_room($result)
{
	echo '<h2>Salles</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune salle<br>' . PHP_EOL;
		return;
	}

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

function display_table_teacher($result)
{
	echo '<h2>Professeurs</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun professeur<br>' . PHP_EOL;
		return;
	}

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

function display_table($table, $limit)
{
	echo '<form action="back-office.php?table=' . $table .
	     '" method="post">' . PHP_EOL;
	echo '  <select name="limit" onchange="this.form.submit()">' . PHP_EOL;
	echo '    <option value="25">25</option>' . PHP_EOL;
	echo '    <option value="50">50</option>' . PHP_EOL;
	echo '    <option value="100">100</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
	echo '</form>' . PHP_EOL;

	if (!isset($limit))
		$limit = 25;

	$link = connect_ins_school();

	$query = 'SELECT * FROM `' . $table . '` LIMIT ' . $limit . ' OFFSET 0';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

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

	if ($table != 'pre_registration') {
		echo '<br>' . PHP_EOL;
		echo link_add_entity($table) . '<br>' . PHP_EOL;
	}

	mysqli_free_result($result);
	mysqli_close($link);
}
?>

<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/libtable.php';

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

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

	require 'views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'views/table_goody.html.php';
		break;
	case 'lesson':
		require 'views/table_lesson.html.php';
		break;
	case 'member':
		require 'views/table_member.html.php';
		break;
	case 'order':
		require 'views/table_order.html.php';
		break;
	case 'pre_registration':
		require 'views/table_pre_registration.html.php';
		break;
	case 'room':
		require 'views/table_room.html.php';
		break;
	case 'teacher':
		require 'views/table_teacher.html.php';
		break;
	}

	require 'views/footer.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}
?>

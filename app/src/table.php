<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

function table_sorting_goody()
{
	$name = '';
	$name_desc = '';
	$price = '';
	$price_desc = '';

	if (isset($_SESSION['goody_sorting'])) {
		switch ($_SESSION['goody_sorting']) {
		case 'name':
			$name = ' selected="selected"';
			break;
		case 'name DESC':
			$name_desc = ' selected="selected"';
			break;
		case 'price':
			$price = ' selected="selected"';
			break;
		case 'price DESC':
			$price_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_goody.html.php';
}

function table_sorting_lesson()
{
	$title = '';
	$title_desc = '';

	if (isset($_SESSION['lesson_sorting'])) {
		switch ($_SESSION['lesson_sorting']) {
		case 'title':
			$title = ' selected="selected"';
			break;
		case 'title DESC':
			$title_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_lesson.html.php';
}

function table_sorting_order()
{
	$date = '';
	$date_desc = '';

	if (isset($_SESSION['order_sorting'])) {
		switch ($_SESSION['order_sorting']) {
		case 'date':
			$date = ' selected="selected"';
			break;
		case 'date DESC':
			$date_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_order.html.php';
}

function table_sorting_person()
{
	$name = '';
	$name_desc = '';

	if (isset($_SESSION['person_sorting'])) {
		switch ($_SESSION['person_sorting']) {
		case 'last_name, first_name':
			$name = ' selected="selected"';
			break;
		case 'last_name DESC, first_name DESC':
			$name_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_person.html.php';
}

function table_sorting_room()
{
	$name = '';
	$name_desc = '';

	if (isset($_SESSION['room_sorting'])) {
		switch ($_SESSION['room_sorting']) {
		case 'name':
			$name = ' selected="selected"';
			break;
		case 'name DESC':
			$name_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_room.html.php';
}

function table_display_limit()
{
	$_25 = '';
	$_50 = '';
	$_100 = '';

	if (isset($_SESSION['limit'])) {
		switch ($_SESSION['limit']) {
		case 25:
			$_25 = ' selected="selected"';
			break;
		case 50:
			$_50 = ' selected="selected"';
			break;
		case 100:
			$_100 = ' selected="selected"';
			break;
		}
	}

	require 'views/table_display_limit.html.php';
}

function table_display_options($table)
{
	require 'views/table_display_options_open.html.php';

	switch ($table) {
	case 'goody':
		table_sorting_goody();
		break;
	case 'lesson':
		table_sorting_lesson();
		break;
	case 'member':
		table_sorting_person();
		break;
	case 'order':
		table_sorting_order();
		break;
	case 'pre_registration':
		table_sorting_person();
		break;
	case 'room':
		table_sorting_room();
		break;
	case 'teacher':
		table_sorting_person();
		break;
	}

	table_display_limit();

	require 'views/table_display_options_close.html.php';
}

function table_pagination($table, $page)
{
	$num_rows = row_count($table);

	if ($num_rows <= $_SESSION['limit'])
		return;

	$num_pages = intdiv($num_rows, $_SESSION['limit']);

	if ($num_rows % $_SESSION['limit'] != 0)
		$num_pages++;

	require 'views/table_pagination.html.php';
}

function init_display_options()
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
}

function select_sorting($table)
{
	$sorting = '';

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
	case 'user':
		$sorting = 'username';
		break;
	default:
		$sorting = $_SESSION['person_sorting'];
		break;
	}

	return $sorting;
}

function display_table($table, $page)
{
	init_display_options();

	if (!isset($page))
		$page = 1;

	$sorting = select_sorting($table);

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
	case 'user':
		if ($_SESSION['admin'])
			require 'views/table_user.html.php';
		break;
	}

	require 'views/footer.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}
?>

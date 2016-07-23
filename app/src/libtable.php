<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/util.php';

function table_pagination($table, $page)
{
	$num_rows = row_count($table);

	if ($num_rows <= $_SESSION['limit'])
		return;

	require 'views/table_pagination.html.php';
}

function table_sorting_goody()
{
	$sorting_name = '';
	$sorting_name_desc = '';
	$sorting_price = '';
	$sorting_price_desc = '';

	if (isset($_SESSION['goody_sorting'])) {
		switch ($_SESSION['goody_sorting']) {
		case 'name':
			$sorting_name = ' selected="selected"';
			break;
		case 'name DESC':
			$sorting_name_desc = ' selected="selected"';
			break;
		case 'price':
			$sorting_price = ' selected="selected"';
			break;
		case 'price DESC':
			$sorting_price_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_goody.html.php';
}

function table_sorting_lesson()
{
	$sorting_title = '';
	$sorting_title_desc = '';

	if (isset($_SESSION['lesson_sorting'])) {
		switch ($_SESSION['lesson_sorting']) {
		case 'title':
			$sorting_title = ' selected="selected"';
			break;
		case 'title DESC':
			$sorting_title_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_lesson.html.php';
}

function table_sorting_order()
{
	$sorting_date = '';
	$sorting_date_desc = '';

	if (isset($_SESSION['order_sorting'])) {
		switch ($_SESSION['order_sorting']) {
		case 'date':
			$sorting_date = ' selected="selected"';
			break;
		case 'date DESC':
			$sorting_date_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_order.html.php';
}

function table_sorting_person()
{
	$sorting_name = '';
	$sorting_name_desc = '';

	if (isset($_SESSION['person_sorting'])) {
		switch ($_SESSION['person_sorting']) {
		case 'last_name, first_name':
			$sorting_name = ' selected="selected"';
			break;
		case 'last_name DESC, first_name DESC':
			$sorting_name_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_person.html.php';
}

function table_sorting_room()
{
	$sorting_name = '';
	$sorting_name_desc = '';

	if (isset($_SESSION['room_sorting'])) {
		switch ($_SESSION['room_sorting']) {
		case 'name':
			$sorting_name = ' selected="selected"';
			break;
		case 'name DESC':
			$sorting_name_desc = ' selected="selected"';
			break;
		}
	}

	require 'views/table_sorting_room.html.php';
}

function table_display_limit()
{
	$limit_25 = '';
	$limit_50 = '';
	$limit_100 = '';

	if (isset($_SESSION['limit'])) {
		switch ($_SESSION['limit']) {
		case 25:
			$limit_25 = ' selected="selected"';
			break;
		case 50:
			$limit_50 = ' selected="selected"';
			break;
		case 100:
			$limit_100 = ' selected="selected"';
			break;
		}
	}

	require 'views/table_display_limit.html.php';
}

function table_display_options($table)
{
	echo '<div>' . PHP_EOL;
	echo '  <form action="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	     '" method="post">' . PHP_EOL;

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

	echo '  </form>' . PHP_EOL;
	echo '</div>' . PHP_EOL;
}
?>

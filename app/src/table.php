<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

require_once 'app/src/connection.php';
require_once 'app/src/error.php';
require_once 'app/src/util.php';

function table_filter_member()
{
	$all = '';
	$valid_registration = '';
	$incomplete_registration = '';
	$incomplete_registration_file = '';
	$unpaid_registration = '';
	$volunteer = '';

	if (isset($_SESSION['member_filter'])) {
		switch ($_SESSION['member_filter']) {
		case 'all':
			$all = ' selected';
			break;
		case 'valid_registration':
			$valid_registration = ' selected';
			break;
		case 'incomplete_registration':
			$incomplete_registration = ' selected';
			break;
		case 'incomplete_registration_file':
			$incomplete_registration_file = ' selected';
			break;
		case 'unpaid_registration':
			$unpaid_registration = ' selected';
			break;
		case 'volunteer':
			$volunteer = ' selected';
			break;
		}
	}

	require 'app/views/table_filter_member.html.php';
}

function table_filter_order()
{
	$link = connect_database();

	$query = 'SELECT member_id, first_name, last_name FROM member ' .
		 'ORDER BY last_name, first_name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$all = '';
	$unpaid = '';

	if (isset($_SESSION['order_filter'])) {
		switch ($_SESSION['order_filter']) {
		case 'all':
			$all = ' selected';
			break;
		case 'unpaid':
			$unpaid = ' selected';
			break;
		}
	}

	require 'app/views/table_filter_order.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function reset_filters($table)
{
	switch ($table) {
	case 'member':
		$_SESSION['member_filter'] = 'all';
		break;
	case 'order':
		$_SESSION['order_filter_by_member'] = '';
		$_SESSION['order_filter'] = 'all';
		break;
	}

	redirect($table);
}

function table_sorting_goody()
{
	$name = '';
	$name_desc = '';
	$price = '';
	$price_desc = '';

	if (isset($_SESSION['goody_sorting'])) {
		switch ($_SESSION['goody_sorting']) {
		case 'name':
			$name = ' selected';
			break;
		case 'name DESC':
			$name_desc = ' selected';
			break;
		case 'price':
			$price = ' selected';
			break;
		case 'price DESC':
			$price_desc = ' selected';
			break;
		}
	}

	require 'app/views/table_sorting_goody.html.php';
}

function table_sorting_lesson()
{
	$title = '';
	$title_desc = '';

	if (isset($_SESSION['lesson_sorting'])) {
		switch ($_SESSION['lesson_sorting']) {
		case 'title':
			$title = ' selected';
			break;
		case 'title DESC':
			$title_desc = ' selected';
			break;
		}
	}

	require 'app/views/table_sorting_lesson.html.php';
}

function table_sorting_order()
{
	$date = '';
	$date_desc = '';

	if (isset($_SESSION['order_sorting'])) {
		switch ($_SESSION['order_sorting']) {
		case 'date':
			$date = ' selected';
			break;
		case 'date DESC':
			$date_desc = ' selected';
			break;
		}
	}

	require 'app/views/table_sorting_order.html.php';
}

function table_sorting_person()
{
	$name = '';
	$name_desc = '';

	if (isset($_SESSION['person_sorting'])) {
		switch ($_SESSION['person_sorting']) {
		case 'last_name, first_name':
			$name = ' selected';
			break;
		case 'last_name DESC, first_name DESC':
			$name_desc = ' selected';
			break;
		}
	}

	require 'app/views/table_sorting_person.html.php';
}

function table_sorting_room()
{
	$name = '';
	$name_desc = '';

	if (isset($_SESSION['room_sorting'])) {
		switch ($_SESSION['room_sorting']) {
		case 'name':
			$name = ' selected';
			break;
		case 'name DESC':
			$name_desc = ' selected';
			break;
		}
	}

	require 'app/views/table_sorting_room.html.php';
}

function table_display_limit()
{
	$_25 = '';
	$_50 = '';
	$_100 = '';

	if (isset($_SESSION['limit'])) {
		switch ($_SESSION['limit']) {
		case 25:
			$_25 = ' selected';
			break;
		case 50:
			$_50 = ' selected';
			break;
		case 100:
			$_100 = ' selected';
			break;
		}
	}

	require 'app/views/table_display_limit.html.php';
}

function table_display_options($table)
{
	require 'app/views/table_display_options_open.html.php';

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

	require 'app/views/table_display_options_close.html.php';
}

function table_pagination($table, $page, $filter = '')
{
	$num_rows = row_count($table, $filter);

	if ($num_rows <= $_SESSION['limit'])
		return;

	$num_pages = int_div($num_rows, $_SESSION['limit']);

	if ($num_rows % $_SESSION['limit'] != 0)
		$num_pages++;

	require 'app/views/table_pagination.html.php';
}

function init_filter()
{
	if (!isset($_SESSION['member_filter']))
		$_SESSION['member_filter'] = 'all';
	if (!isset($_SESSION['order_filter_by_member']))
		$_SESSION['order_filter_by_member'] = '';
	if (!isset($_SESSION['order_filter']))
		$_SESSION['order_filter'] = 'all';
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

function check_registrations($link, $member_id)
{
	$query = 'SELECT registration_id FROM registration WHERE member_id = ' .
		 $member_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result)) {
		if (!registration_ok($row['registration_id'])) {
			mysqli_free_result($result);
			return false;
		}
	}

	mysqli_free_result($result);

	return true;
}

function prepare_filter_member_ok()
{
	$link = connect_database();

	$query = 'SELECT member_id FROM registration';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$filter = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if (check_registrations($link, $row['member_id'])) {
			if ($filter == '')
				$filter = ' WHERE ';
			else
				$filter .= ' OR ';

			$filter .= 'member_id = ' . $row['member_id'];
		}
	}

	mysqli_free_result($result);
	mysqli_close($link);

	if ($filter == '')
		return ' WHERE 0';

	return $filter;
}

function prepare_filter_member($function)
{
	$link = connect_database();

	$query = 'SELECT registration_id, member_id FROM registration';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$filter = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if (!$function($row['registration_id'])) {
			if ($filter == '')
				$filter = ' WHERE ';
			else
				$filter .= ' OR ';

			$filter .= 'member_id = ' . $row['member_id'];
		}
	}

	mysqli_free_result($result);
	mysqli_close($link);

	if ($filter == '')
		return ' WHERE 0';

	return $filter;
}

function prepare_filter_order_unpaid()
{
	$link = connect_database();

	$query = 'SELECT order_id FROM `order`';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$filter = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if (!order_paid($row['order_id'])) {
			if ($filter != '')
				$filter .= ' OR ';

			$filter .= 'order_id = ' . $row['order_id'];
		}
	}

	mysqli_free_result($result);
	mysqli_close($link);

	if ($filter == '')
		return '0';

	return $filter;
}

function select_filter($table)
{
	$filter = '';

	switch ($table) {
	case 'member':
		switch ($_SESSION['member_filter']) {
		case 'valid_registration':
			$filter = prepare_filter_member_ok();
			break;
		case 'incomplete_registration':
			$filter = prepare_filter_member(registration_complete);
			break;
		case 'incomplete_registration_file':
			$filter = prepare_filter_member(
					registration_file_complete);
			break;
		case 'unpaid_registration':
			$filter = prepare_filter_member(registration_paid);
			break;
		case 'volunteer':
			$filter = ' WHERE volunteer = 1';
			break;
		}

		break;
	case 'order':
		if ($_SESSION['order_filter_by_member'] != '')
			$filter = ' WHERE member_id = ' .
				  $_SESSION['order_filter_by_member'];

		if ($_SESSION['order_filter'] == 'unpaid') {
			if ($filter == '')
				$filter = ' WHERE ' .
					  prepare_filter_order_unpaid();
			else
				$filter .= ' AND (' .
					   prepare_filter_order_unpaid() . ')';
		}

		break;
	}

	return $filter;
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

function display_table($table, $page = null)
{
	init_filter();
	init_display_options();

	if (!isset($page))
		$page = 1;

	$filter = select_filter($table);
	$sorting = select_sorting($table);

	$offset = ($page - 1) * $_SESSION['limit'];

	$link = connect_database();

	$query = 'SELECT * FROM `' . $table . '`' . $filter . ' ORDER BY ' .
		 $sorting . ' LIMIT ' . $offset . ', ' . $_SESSION['limit'];
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'app/views/table_goody.html.php';
		break;
	case 'lesson':
		require 'app/views/table_lesson.html.php';
		break;
	case 'member':
		require 'app/views/table_member.html.php';
		break;
	case 'order':
		require 'app/views/table_order.html.php';
		break;
	case 'pre_registration':
		require 'app/views/table_pre_registration.html.php';
		break;
	case 'room':
		require 'app/views/table_room.html.php';
		break;
	case 'teacher':
		require 'app/views/table_teacher.html.php';
		break;
	case 'user':
		if ($_SESSION['admin'])
			require 'app/views/table_user.html.php';
		break;
	}

	require 'app/views/footer.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function display_incomplete_registrations()
{
	$link = connect_database();

	$query = 'SELECT registration.registration_id, registration.season, ' .
		 'member.first_name, member.last_name FROM registration ' .
		 'INNER JOIN member ' .
		 'ON member.member_id = registration.member_id ' .
		 'WHERE registration.price = 0 ' .
		 'ORDER BY member.last_name, member.first_name, ' .
		 'registration.season DESC';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/incomplete_registrations.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function display_popular_lessons()
{
	$link = connect_database();

	$query = 'SELECT registration_detail.lesson_id, lesson.title ' .
		 'FROM registration_detail INNER JOIN registration ' .
		 'ON registration.registration_id = ' .
		 'registration_detail.registration_id INNER JOIN lesson ' .
		 'ON lesson.lesson_id = registration_detail.lesson_id ' .
		 'WHERE season = "' . current_season() . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result)) {
		$row = html_encode_strings($row);
		$num_registrants = lesson_registrant_count($row['lesson_id'],
							   current_season());
		$titles[$row['lesson_id']] = $row['title'];
		$registrant_counts[$row['lesson_id']] = $num_registrants;
	}

	mysqli_free_result($result);
	mysqli_close($link);

	if (isset($registrant_counts))
		arsort($registrant_counts);

	require 'app/views/popular_lessons.html.php';
}

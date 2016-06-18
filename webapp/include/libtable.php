<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/util.php';

function table_pagination($table, $page)
{
	$num_rows = row_count($table);

	if ($num_rows <= $_SESSION['limit'])
		return;

	echo '<br>' . PHP_EOL;
	echo '<nav>' . PHP_EOL;

	if ($page > 1)
		echo '  ' . link_table_previous($table, $page - 1) . PHP_EOL;

	echo '  ' . $page . PHP_EOL;

	if ($page * $_SESSION['limit'] < $num_rows)
		echo '  ' . link_table_next($table, $page + 1) . PHP_EOL;

	echo '</nav>' . PHP_EOL;
}

function table_goody_sorting()
{
	$sorting_name = '';
	$sorting_name_desc = '';
	$sorting_price = '';
	$sorting_price_desc = '';

	if (isset($_SESSION['goody_sorting'])) {
		if ($_SESSION['goody_sorting'] == 'name')
			$sorting_name = ' selected="selected"';
		else if ($_SESSION['goody_sorting'] == 'name DESC')
			$sorting_name_desc = ' selected="selected"';
		else if ($_SESSION['goody_sorting'] == 'price')
			$sorting_price = ' selected="selected"';
		else
			$sorting_price_desc = ' selected="selected"';
	}

	echo '  Trier par :' . PHP_EOL;
	echo '  <select name="goody_sorting" onchange="this.form.submit()">' .
	     PHP_EOL;
	echo '    <option value="name"' . $sorting_name .
	     '>ordre alphabétique</option>' . PHP_EOL;
	echo '    <option value="name DESC"' . $sorting_name_desc .
	     '>ordre alphabétique inverse</option>' . PHP_EOL;
	echo '    <option value="price"' . $sorting_price .
	     '>prix croissant</option>' . PHP_EOL;
	echo '    <option value="price DESC"' . $sorting_price_desc .
	     '>prix décroissant</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
}

function table_lesson_sorting()
{
	$sorting_title = '';
	$sorting_title_desc = '';

	if (isset($_SESSION['lesson_sorting'])) {
		if ($_SESSION['lesson_sorting'] == 'title')
			$sorting_title = ' selected="selected"';
		else
			$sorting_title_desc = ' selected="selected"';
	}

	echo '  Trier par :' . PHP_EOL;
	echo '  <select name="lesson_sorting" onchange="this.form.submit()">' .
	     PHP_EOL;
	echo '    <option value="title"' . $sorting_title .
	     '>ordre alphabétique</option>' . PHP_EOL;
	echo '    <option value="title DESC"' . $sorting_title_desc .
	     '>ordre alphabétique inverse</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
}

function table_order_sorting()
{
	$sorting_date = '';
	$sorting_date_desc = '';

	if (isset($_SESSION['order_sorting'])) {
		if ($_SESSION['order_sorting'] == 'date')
			$sorting_date = ' selected="selected"';
		else
			$sorting_date_desc = ' selected="selected"';
	}

	echo '  Trier par :' . PHP_EOL;
	echo '  <select name="order_sorting" onchange="this.form.submit()">' .
	     PHP_EOL;
	echo '    <option value="date"' . $sorting_date .
	     '>date croissante</option>' . PHP_EOL;
	echo '    <option value="date DESC"' . $sorting_date_desc .
	     '>date décroissante</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
}

function table_person_sorting()
{
	$sorting_name = '';
	$sorting_name_desc = '';

	if (isset($_SESSION['person_sorting'])) {
		if ($_SESSION['person_sorting'] == 'last_name, first_name')
			$sorting_name = ' selected="selected"';
		else
			$sorting_name_desc = ' selected="selected"';
	}

	echo '  Trier par :' . PHP_EOL;
	echo '  <select name="person_sorting" onchange="this.form.submit()">' .
	     PHP_EOL;
	echo '    <option value="last_name, first_name"' . $sorting_name .
	     '>ordre alphabétique</option>' . PHP_EOL;
	echo '    <option value="last_name DESC, first_name DESC"' .
	     $sorting_name_desc . '>ordre alphabétique inverse</option>' .
	     PHP_EOL;
	echo '  </select>' . PHP_EOL;
}

function table_room_sorting()
{
	$sorting_name = '';
	$sorting_name_desc = '';

	if (isset($_SESSION['room_sorting'])) {
		if ($_SESSION['room_sorting'] == 'name')
			$sorting_name = ' selected="selected"';
		else
			$sorting_name_desc = ' selected="selected"';
	}

	echo '  Trier par :' . PHP_EOL;
	echo '  <select name="room_sorting" onchange="this.form.submit()">' .
	     PHP_EOL;
	echo '    <option value="name"' . $sorting_name .
	     '>ordre alphabétique</option>' . PHP_EOL;
	echo '    <option value="name DESC"' . $sorting_name_desc .
	     '>ordre alphabétique inverse</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
}

function table_display_limit()
{
	$limit_25 = '';
	$limit_50 = '';
	$limit_100 = '';

	if (isset($_SESSION['limit'])) {
		if ($_SESSION['limit'] == 25)
			$limit_25 = ' selected="selected"';
		else if ($_SESSION['limit'] == 50)
			$limit_50 = ' selected="selected"';
		else
			$limit_100 = ' selected="selected"';
	}

	echo '  Lignes par page :' . PHP_EOL;
	echo '  <select name="limit" onchange="this.form.submit()">' . PHP_EOL;
	echo '    <option value="25"' . $limit_25 . '>25</option>' . PHP_EOL;
	echo '    <option value="50"' . $limit_50 . '>50</option>' . PHP_EOL;
	echo '    <option value="100"' . $limit_100 . '>100</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
}

function table_display_options($table)
{
	echo '<form action="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	     '" method="post">' . PHP_EOL;

	switch ($table) {
	case 'goody':
		table_goody_sorting();
		break;
	case 'lesson':
		table_lesson_sorting();
		break;
	case 'member':
		table_person_sorting();
		break;
	case 'order':
		table_order_sorting();
		break;
	case 'pre_registration':
		table_person_sorting();
		break;
	case 'room':
		table_room_sorting();
		break;
	case 'teacher':
		table_person_sorting();
		break;
	}

	table_display_limit();

	echo '</form>' . PHP_EOL;
}
?>

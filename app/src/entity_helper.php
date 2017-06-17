<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

/*
 * Helper functions for displaying entities
 */
function display_entity_payments($link, $table, $id)
{
	$query = 'SELECT * FROM ' . $table . '_payment WHERE ' . $table .
		 '_id = ' . $id . ' ORDER BY date';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/entity_payments.html.php';

	mysqli_free_result($result);
}

function display_lesson_registrants($link, $lesson_id)
{
	$season = (isset($_POST['season'])) ?
		$_POST['season'] :
		current_season();

	$query = 'SELECT member.member_id, member.first_name, ' .
		 'member.last_name FROM member INNER JOIN registration ' .
		 'ON registration.member_id = member.member_id ' .
		 'INNER JOIN registration_detail ' .
		 'ON registration_detail.registration_id = ' .
		 'registration.registration_id ' .
		 'WHERE registration_detail.lesson_id = ' . $lesson_id .
		 ' AND registration.season = "' . $season .
		 '" ORDER BY member.last_name, member.first_name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/lesson_registrants.html.php';

	mysqli_free_result($result);
}

function display_member_registrations($link, $member_id)
{
	$query = 'SELECT * FROM registration WHERE member_id = ' . $member_id .
		 ' ORDER BY season DESC';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/member_registrations.html.php';

	mysqli_free_result($result);
}

function display_order_content($link, $order_id)
{
	$query = 'SELECT order_content.goody_id, order_content.quantity, ' .
		 'goody.name, goody.price FROM order_content ' .
		 'INNER JOIN goody ON goody.goody_id = ' .
		 'order_content.goody_id WHERE order_content.order_id = ' .
		 $order_id . ' ORDER BY goody.name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/order_content.html.php';

	mysqli_free_result($result);
}

function display_registration_detail($link, $registration_id)
{
	$query = 'SELECT registration_detail.lesson_id, ' .
		 'registration_detail.show_participation, lesson.title ' .
		 'FROM registration_detail INNER JOIN lesson ' .
		 'ON lesson.lesson_id = registration_detail.lesson_id ' .
		 'WHERE registration_detail.registration_id = ' .
		 $registration_id . ' ORDER BY lesson.title';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/registration_detail.html.php';

	mysqli_free_result($result);
}

function display_registration_file($link, $registration_id)
{
	$query = 'SELECT * FROM registration_file WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'app/views/registration_file.html.php';

	mysqli_free_result($result);
}

/*
 * Helper functions for adding and modifying entities
 */
function prepare_data_goody(&$data)
{
	if ($data['price'] == '')
		$data['price'] = 'NULL';
	if ($data['stock'] == '')
		$data['stock'] = 0;
}

function prepare_data_lesson(&$data)
{
	if ($data['teacher_id'] == '')
		$data['teacher_id'] = 'NULL';
	if ($data['day'] == '')
		$data['day'] = 'NULL';
	else
		$data['day'] = '"' . $data['day'] . '"';
	if ($data['room_id'] == '')
		$data['room_id'] = 'NULL';

	if ($data['st_hour'] == '' || $data['st_minute'] == '')
		$start_time = 'NULL';
	else
		$start_time = '"' . to_time($data['st_hour'],
					    $data['st_minute']) . '"';

	if ($data['et_hour'] == '' || $data['et_minute'] == '')
		$end_time = 'NULL';
	else
		$end_time = '"' . to_time($data['et_hour'],
					  $data['et_minute']) . '"';

	return array($start_time, $end_time);
}

function prepare_data_member($data)
{
	$birth_date = to_date($data['bd_day'], $data['bd_month'],
			      $data['bd_year']);
	$cellphone = format_phone_number($data['cellphone']);
	$cellphone_father = format_phone_number($data['cellphone_father']);
	$cellphone_mother = format_phone_number($data['cellphone_mother']);
	$phone = format_phone_number($data['phone']);

	return array($birth_date, $cellphone, $cellphone_father,
		     $cellphone_mother, $phone);
}

function prepare_data_payment($data)
{
	$cashing_date = to_date($data['cd_day'], $data['cd_month'],
				$data['cd_year']);

	return $cashing_date;
}

function prepare_data_pre_registration(&$data)
{
	if (!$data['with_lessons'])
		$data['plan'] = 'NULL';
	else if ($data['plan'] == '')
		$data['plan'] = 'NULL';
	else
		$data['plan'] = '"' . $data['plan'] . '"';

	$birth_date = to_date($data['bd_day'], $data['bd_month'],
			      $data['bd_year']);
	$cellphone = format_phone_number($data['cellphone']);
	$cellphone_father = format_phone_number($data['cellphone_father']);
	$cellphone_mother = format_phone_number($data['cellphone_mother']);
	$phone = format_phone_number($data['phone']);

	return array($birth_date, $cellphone, $cellphone_father,
		     $cellphone_mother, $phone);
}

function prepare_data_registration(&$data)
{
	if ($data['plan'] == '')
		$data['plan'] = 'NULL';
	else
		$data['plan'] = '"' . $data['plan'] . '"';
	if ($data['price'] == '')
		$data['price'] = 'NULL';
	if ($data['discount'] == '')
		$data['discount'] = 0;
	if ($data['num_payments'] == '')
		$data['num_payments'] = 'NULL';

	$followed_quarters_str = '';

	if ($data['plan'] == '"QUARTERLY"')
		$followed_quarters_str = followed_quarters_to_string($data);

	return $followed_quarters_str;
}

function prepare_data_teacher($data)
{
	if ($data['bd_day'] == '' || $data['bd_month'] == '' ||
	    $data['bd_year'] == '')
		$birth_date = 'NULL';
	else
		$birth_date = '"' . to_date($data['bd_day'], $data['bd_month'],
					    $data['bd_year']) . '"';

	$cellphone = format_phone_number($data['cellphone']);
	$phone = format_phone_number($data['phone']);

	return array($birth_date, $cellphone, $phone);
}

function prepare_data_user(&$data)
{
	if ($data['admin'] == '')
		$data['admin'] = 0;
}

/*
 * Helper function for adding registrations
 */
function add_registration_file($link, $registration_id)
{
	$query = 'INSERT INTO registration_file (registration_id) VALUES (' .
		 $registration_id . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

/*
 * Helper functions for deleting entities
 */
function update_lesson($link, $lesson_id, $ref_table)
{
	$query = 'UPDATE lesson SET ' . $ref_table .
		 '_id = 0 WHERE lesson_id = ' . $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function check_dependencies_lesson($link, $ref_table, $ref_id)
{
	$query = 'SELECT lesson_id FROM lesson WHERE ' . $ref_table . '_id = ' .
		 $ref_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result))
		update_lesson($link, $row['lesson_id'], $ref_table);

	mysqli_free_result($result);
}

function check_dependencies_by_table($link, $table, $ref_table, $ref_id)
{
	$query = 'SELECT ' . $table . '_id FROM `' . $table . '` WHERE ' .
		 $ref_table . '_id = ' . $ref_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result))
		delete_entity($table, $row[$table . '_id']);

	mysqli_free_result($result);
}

function check_dependencies_by_table_by_fk($link, $table, $ref_table, $ref_id)
{
	if ($table == 'order_content' && $ref_table == 'order')
		update_goody_stock_by_order($link, $ref_id);

	$query = 'DELETE FROM `' . $table . '` WHERE ' . $ref_table . '_id = ' .
		 $ref_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function check_dependencies($link, $table, $id)
{
	switch ($table) {
	case 'goody':
		check_dependencies_by_table_by_fk($link, 'order_content',
						  $table, $id);
		break;
	case 'lesson':
		check_dependencies_by_table_by_fk($link, 'registration_detail',
						  $table, $id);
		break;
	case 'member':
		check_dependencies_by_table($link, 'order', $table, $id);
		check_dependencies_by_table($link, 'registration', $table, $id);
		break;
	case 'order':
		check_dependencies_by_table_by_fk($link, 'order_content',
						  $table, $id);
		check_dependencies_by_table($link, 'order_payment', $table,
					    $id);
		break;
	case 'registration':
		check_dependencies_by_table_by_fk($link, 'registration_detail',
						  $table, $id);
		check_dependencies_by_table_by_fk($link, 'registration_file',
						  $table, $id);
		check_dependencies_by_table($link, 'registration_payment',
					    $table, $id);
		break;
	case 'room':
		check_dependencies_lesson($link, $table, $id);
		break;
	case 'teacher':
		check_dependencies_lesson($link, $table, $id);
		break;
	}
}

/*
 * Helper functions for managing goodies stock according to orders
 */
function update_goody_stock($link, $goody_id, $difference)
{
	$query = 'UPDATE goody SET stock = stock + (' . $difference .
		 ') WHERE goody_id = ' . $goody_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function update_goody_stock_by_order($link, $order_id)
{
	$query = 'SELECT goody_id, quantity FROM order_content ' .
		 'WHERE order_id = ' . $order_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result))
		update_goody_stock($link, $row['goody_id'], $row['quantity']);

	mysqli_free_result($result);
}

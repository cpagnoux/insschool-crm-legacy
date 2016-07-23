<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/libpre-registration.php';
require_once 'src/entity.php';

/*
 * Helper functions for displaying member-related data
 */
function display_member_registrations($link, $member_id)
{
	$query = 'SELECT * FROM registration WHERE member_id = ' . $member_id .
		 ' ORDER BY season DESC';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/member_registrations.html.php';

	mysqli_free_result($result);
}

/*
 * Helper functions for displaying order-related data
 */
function display_order_content($link, $order_id)
{
	$query = 'SELECT order_content.goody_id, order_content.quantity, ' .
		 'goody.name, goody.price FROM order_content ' .
		 'INNER JOIN goody ON order_content.goody_id = ' .
		 'goody.goody_id WHERE order_content.order_id = ' . $order_id .
		 ' ORDER BY order_content.goody_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/order_content.html.php';

	mysqli_free_result($result);
}

/*
 * Helper functions for displaying registration-related data
 */
function display_registration_detail($link, $registration_id)
{
	$query = 'SELECT registration_detail.lesson_id, ' .
		 'registration_detail.show_participation, lesson.title ' .
		 'FROM registration_detail INNER JOIN lesson ' .
		 'ON registration_detail.lesson_id = lesson.lesson_id ' .
		 'WHERE registration_detail.registration_id = ' .
		 $registration_id . ' ORDER BY lesson.title';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/registration_detail.html.php';

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

	require 'views/registration_file.html.php';

	mysqli_free_result($result);
}

/*
 * Helper functions for displaying payments
 */
function display_entity_payments($link, $table, $id)
{
	$query = 'SELECT * FROM ' . $table . '_payment WHERE ' . $table .
		 '_id = ' . $id . ' ORDER BY date';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/entity_payments.html.php';

	mysqli_free_result($result);
}

/*
 * Drop-down lists for forms
 */
function select_day($day)
{
	$day_monday = '';
	$day_tuesday = '';
	$day_wednesday = '';
	$day_thursday = '';
	$day_friday = '';

	if (isset($day)) {
		switch ($day) {
		case 'MONDAY':
			$day_monday = ' selected="selected"';
			break;
		case 'TUESDAY':
			$day_tuesday = ' selected="selected"';
			break;
		case 'WEDNESDAY':
			$day_wednesday = ' selected="selected"';
			break;
		case 'THURSDAY':
			$day_thursday = ' selected="selected"';
			break;
		case 'FRIDAY':
			$day_friday = ' selected="selected"';
			break;
		}
	}

	require 'views/select_day.html.php';
}

function select_goody()
{
	$link = connect_database();

	$query = 'SELECT goody_id, name FROM goody ORDER BY name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_goody.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_lesson()
{
	$link = connect_database();

	$query = 'SELECT lesson_id, title FROM lesson ORDER BY title';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_lesson.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_member($member_id)
{
	$link = connect_database();

	$query = 'SELECT member_id, first_name, last_name FROM member ' .
		 'ORDER BY last_name, first_name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_member.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_mode($mode)
{
	$mode_cash = '';
	$mode_check = '';

	if (isset($mode)) {
		switch ($mode) {
		case 'CASH':
			$mode_cash = ' selected="selected"';
			break;
		case 'CHECK':
			$mode_check = ' selected="selected"';
			break;
		}
	}

	require 'views/select_mode.html.php';
}

function select_room($room_id)
{
	$link = connect_database();

	$query = 'SELECT room_id, name FROM room ORDER BY room_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_room.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_teacher($teacher_id)
{
	$link = connect_database();

	$query = 'SELECT teacher_id, first_name, last_name FROM teacher ' .
		 'ORDER BY last_name, first_name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_teacher.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

/*
 * Forms' content
 */
function form_entity_member($row)
{
	$means_of_knowledge_poster_flyer = '';
	$means_of_knowledge_internet = '';
	$means_of_knowledge_word_of_mouth = '';
	$volunteer_true = '';
	$volunteer_false = '';

	if (isset($row)) {
		switch ($row['means_of_knowledge']) {
		case 'POSTER_FLYER':
			$means_of_knowledge_poster_flyer = ' checked="checked"';
			break;
		case 'INTERNET':
			$means_of_knowledge_internet = ' checked="checked"';
			break;
		case 'WORD_OF_MOUTH':
			$means_of_knowledge_word_of_mouth =
					' checked="checked"';
			break;
		}

		if ($row['volunteer'])
			$volunteer_true = ' checked="checked"';
		else
			$volunteer_false = ' checked="checked"';
	}

	require 'views/form_member.html.php';
}

function form_entity_pre_registration($row)
{
	$lessons = array();
	$means_of_knowledge_poster_flyer = '';
	$means_of_knowledge_internet = '';
	$means_of_knowledge_word_of_mouth = '';

	if (isset($row)) {
		$lessons = string_to_lessons($row['lessons']);

		switch ($row['means_of_knowledge']) {
		case 'POSTER_FLYER':
			$means_of_knowledge_poster_flyer = ' checked="checked"';
			break;
		case 'INTERNET':
			$means_of_knowledge_internet = ' checked="checked"';
			break;
		case 'WORD_OF_MOUTH':
			$means_of_knowledge_word_of_mouth =
					' checked="checked"';
			break;
		}
	}

	require 'views/form_pre_registration.html.php';
}

function form_entity_registration_file($registration_id, $row)
{
	$medical_certificate_true = '';
	$medical_certificate_false = '';
	$insurance_true = '';
	$insurance_false = '';
	$photo_true = '';
	$photo_false = '';

	if (isset($row)) {
		if ($row['medical_certificate'])
			$medical_certificate_true = ' checked="checked"';
		else
			$medical_certificate_false = ' checked="checked"';

		if ($row['insurance'])
			$insurance_true = ' checked="checked"';
		else
			$insurance_false = ' checked="checked"';

		if ($row['photo'])
			$photo_true = ' checked="checked"';
		else
			$photo_false = ' checked="checked"';
	}

	require 'views/form_registration_file.html.php';
}

/*
 * Helper function for adding registrations
 */
function add_registration_file($link, $registration_id)
{
	$query = 'INSERT INTO registration_file VALUES (' . $registration_id .
		 ', "", "", "")';
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
 * Helper function to manage goodies stock according to orders
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
?>

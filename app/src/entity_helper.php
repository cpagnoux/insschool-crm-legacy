<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/entity.php';

/*
 * Helper functions for displaying entities
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
?>

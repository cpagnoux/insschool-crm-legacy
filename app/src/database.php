<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

/*
 * Connection
 */
function connect_database()
{
	$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if (!$link) {
		sql_connect_error();
		exit;
	}

	mysqli_set_charset($link, 'utf8');

	return $link;
}

/*
 * Security
 */
function sql_escape_strings($array)
{
	if (!isset($array))
		return;

	$link = connect_database();

	foreach($array as &$value) {
		$value = trim($value);
		$value = mysqli_real_escape_string($link, $value);
	}

	mysqli_close($link);

	return $array;
}

/*
 * Queries
 */
function earnings_from_goody($goody_id, $season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_payment.amount FROM order_payment ' .
		 'INNER JOIN `order` ' .
		 'ON order.order_id = order_payment.order_id ' .
		 'INNER JOIN order_content ' .
		 'ON order_content.order_id = order.order_id ' .
		 'WHERE order_content.goody_id = ' . $goody_id .
		 ' AND order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$earnings = 0;

	while ($row = mysqli_fetch_assoc($result))
		$earnings += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $earnings);
}

function earnings_from_orders($season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_payment.amount FROM order_payment ' .
		 'INNER JOIN `order` ' .
		 'ON order.order_id = order_payment.order_id ' .
		 'WHERE order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$earnings = 0;

	while ($row = mysqli_fetch_assoc($result))
		$earnings += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $earnings);
}

function earnings_from_registrations($season)
{
	$link = connect_database();

	$query = 'SELECT registration_payment.amount ' .
		 'FROM registration_payment INNER JOIN registration ' .
		 'ON registration.registration_id = ' .
		 'registration_payment.registration_id ' .
		 'WHERE registration.season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$earnings = 0;

	while ($row = mysqli_fetch_assoc($result))
		$earnings += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $earnings);
}

function get_entity_name($table, $id)
{
	$link = connect_database();

	$query = 'SELECT name FROM `' . $table . '` WHERE ' . $table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	$row = html_encode_strings($row);

	return $row['name'];
}

function get_goody_id_from_name($name)
{
	$link = connect_database();

	$query = 'SELECT goody_id FROM goody WHERE name = "' . $name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['goody_id'];
}

function get_lesson_id_from_title($title)
{
	$link = connect_database();

	$query = 'SELECT lesson_id FROM lesson WHERE title = "' . $title . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['lesson_id'];
}

function get_lesson_title($lesson_id)
{
	$link = connect_database();

	$query = 'SELECT title FROM lesson WHERE lesson_id = ' . $lesson_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	$row = html_encode_strings($row);

	return $row['title'];
}

function get_member_id($registration_id)
{
	$link = connect_database();

	$query = 'SELECT member_id FROM registration WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['member_id'];
}

function get_member_id_from_name($first_name, $last_name)
{
	$link = connect_database();

	$query = 'SELECT member_id FROM member WHERE first_name = "' .
		 $first_name . '" AND last_name = "' . $last_name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['member_id'];
}

function get_name($table, $id)
{
	$link = connect_database();

	$query = 'SELECT first_name, last_name FROM `' . $table . '` WHERE ' .
		 $table . '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	$row = html_encode_strings($row);

	return $row['first_name'] . ' ' . $row['last_name'];
}

function get_order_content_quantity($order_id, $goody_id)
{
	$link = connect_database();

	$query = 'SELECT quantity FROM order_content WHERE order_id = ' .
		 $order_id . ' AND goody_id = ' . $goody_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['quantity'];
}

function get_order_id($order_payment_id)
{
	$link = connect_database();

	$query = 'SELECT order_id FROM order_payment ' .
		 'WHERE order_payment_id = ' . $order_payment_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['order_id'];
}

function get_order_id_from_info($member_id)
{
	$link = connect_database();

	$query = 'SELECT order_id FROM `order` WHERE member_id = ' .
		 $member_id . ' ORDER BY date DESC';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['order_id'];
}

function get_registration_id($registration_payment_id)
{
	$link = connect_database();

	$query = 'SELECT registration_id FROM registration_payment ' .
		 'WHERE registration_payment_id = ' . $registration_payment_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['registration_id'];
}

function get_registration_id_from_info($member_id, $season)
{
	$link = connect_database();

	$query = 'SELECT registration_id FROM registration WHERE member_id = ' .
		 $member_id . ' AND season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['registration_id'];
}

function get_registration_season($registration_id)
{
	$link = connect_database();

	$query = 'SELECT season FROM registration WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	$row = html_encode_strings($row);

	return $row['season'];
}

function get_room_id_from_name($name)
{
	$link = connect_database();

	$query = 'SELECT room_id FROM room WHERE name = "' . $name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['room_id'];
}

function get_teacher_id_from_name($first_name, $last_name)
{
	$link = connect_database();

	$query = 'SELECT teacher_id FROM teacher WHERE first_name = "' .
		 $first_name . '" AND last_name = "' . $last_name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['teacher_id'];
}

function goodies_sold($goody_id, $season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_content.quantity, order.order_id ' .
		 'FROM order_content INNER JOIN `order` ' .
		 'ON order.order_id = order_content.order_id ' .
		 'WHERE order_content.goody_id = ' . $goody_id .
		 ' AND order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$goodies_sold = 0;

	while ($row = mysqli_fetch_assoc($result)) {
		if (order_paid($row['order_id']))
			$goodies_sold += $row['quantity'];
	}

	mysqli_free_result($result);
	mysqli_close($link);

	return $goodies_sold;
}

function lesson_registrant_count($lesson_id, $season)
{
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM registration_detail ' .
		 'INNER JOIN registration ' .
		 'ON registration.registration_id = ' .
		 'registration_detail.registration_id ' .
		 'WHERE registration_detail.lesson_id = ' . $lesson_id .
		 ' AND registration.season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function member_count($season)
{
	return row_count('registration', ' WHERE season = "' . $season . '"');
}

function order_paid($order_id)
{
	return (total_paid('order', $order_id) == order_total($order_id));
}

function order_total($order_id)
{
	$link = connect_database();

	$query = 'SELECT order_content.quantity, goody.price ' .
		 'FROM order_content INNER JOIN goody ' .
		 'ON goody.goody_id = order_content.goody_id ' .
		 'WHERE order_content.order_id = ' . $order_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$total = 0;

	while ($row = mysqli_fetch_assoc($result))
		$total += $row['price'] * $row['quantity'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $total);
}

function registration_complete($registration_id)
{
	$link = connect_database();

	$query = 'SELECT price FROM registration WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return ($row['price'] != 0);
}

function registration_file_complete($registration_id)
{
	$link = connect_database();

	$query = 'SELECT * FROM registration_file WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return ($row['medical_certificate'] && $row['insurance'] &&
		$row['photo'] && $row['stamped_envelope']);
}

function registration_formula($registration_id)
{
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM registration_detail ' .
		 'WHERE registration_id = ' . $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function registration_ok($registration_id)
{
	return (registration_complete($registration_id) &&
		registration_file_complete($registration_id) &&
		registration_paid($registration_id));
}

function registration_paid($registration_id)
{
	return (total_paid('registration', $registration_id) ==
		registration_price($registration_id));
}

function registration_price($registration_id)
{
	$link = connect_database();

	$query = 'SELECT price, discount FROM registration ' .
		 'WHERE registration_id = ' . $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return price_after_discount($row['price'], $row['discount']);
}

function row_count($table, $filter = '')
{
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM `' . $table . '`' . $filter;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function total_goodies_sold($season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_content.quantity, order.order_id ' .
		 'FROM order_content INNER JOIN `order` ' .
		 'ON order.order_id = order_content.order_id ' .
		 'WHERE order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$goodies_sold = 0;

	while ($row = mysqli_fetch_assoc($result)) {
		if (order_paid($row['order_id']))
			$goodies_sold += $row['quantity'];
	}

	mysqli_free_result($result);
	mysqli_close($link);

	return $goodies_sold;
}

function total_paid($table, $id)
{
	$link = connect_database();

	$query = 'SELECT amount FROM ' . $table . '_payment WHERE ' . $table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$total_paid = 0;

	while ($row = mysqli_fetch_assoc($result))
		$total_paid += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $total_paid);
}

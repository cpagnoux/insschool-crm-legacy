<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/libentity.php';

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/libpre-registration.php';
require_once 'src/table.php';

/*
 * Display of entity
 */
function display_entity($table, $id)
{
	$link = connect_database();

	$query = 'SELECT * FROM `' . $table . '` WHERE ' . $table . '_id = ' .
		 $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);

	require 'views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'views/goody.html.php';
		break;
	case 'lesson':
		require 'views/lesson.html.php';
		break;
	case 'member':
		require 'views/member.html.php';
		break;
	case 'order':
		require 'views/order.html.php';
		break;
	case 'pre_registration':
		require 'views/pre_registration.html.php';
		break;
	case 'registration':
		require 'views/registration.html.php';
		break;
	case 'room':
		require 'views/room.html.php';
		break;
	case 'teacher':
		require 'views/teacher.html.php';
		break;
	}

	require 'views/footer.html.php';

	mysqli_close($link);
}

/*
 * Forms for entity add
 */
function form_add_entity($table, $id)
{
	require 'views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'views/form_add_goody.html.php';
		break;
	case 'lesson':
		require 'views/form_add_lesson.html.php';
		break;
	case 'member':
		require 'views/form_add_member.html.php';
		break;
	case 'order':
		require 'views/form_add_order.html.php';
		break;
	case 'order_content':
		$order_id = $id;
		require 'views/form_add_order_content.html.php';
		break;
	case 'order_payment':
		require 'views/form_add_order_payment.html.php';
		break;
	case 'registration':
		$member_id = $id;
		require 'views/form_add_registration.html.php';
		break;
	case 'registration_detail':
		$registration_id = $id;
		require 'views/form_add_registration_detail.html.php';
		break;
	case 'registration_payment':
		require 'views/form_add_registration_payment.html.php';
		break;
	case 'room':
		require 'views/form_add_room.html.php';
		break;
	case 'teacher':
		require 'views/form_add_teacher.html.php';
		break;
	}

	require 'views/footer.html.php';
}

/*
 * Add of entity
 */
function add_entity_goody($link, $data)
{
	$query = 'INSERT INTO goody VALUES ("", "' . $data['name'] . '", "' .
		 $data['description'] . '", "' . $data['price'] . '", "' .
		 $data['stock'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$goody_id = get_goody_id_from_name($data['name']);
	display_entity('goody', $goody_id);
}

function add_entity_lesson($link, $data)
{
	$query = 'INSERT INTO lesson VALUES ("", "' . $data['title'] . '", "' .
		 $data['teacher_id'] . '", "' . $data['day'] . '", "' .
		 $data['start_time'] . '", "' . $data['end_time'] . '", "' .
		 $data['room_id'] . '", "' . $data['costume'] . '", "' .
		 $data['t_shirt'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$lesson_id = get_lesson_id_from_title($data['title']);
	display_entity('lesson', $lesson_id);
}

function add_entity_member($link, $data)
{
	$query = 'INSERT INTO member VALUES ("", "' . $data['first_name'] .
		 '", "' . $data['last_name'] . '", "' . $data['birth_date'] .
		 '", "' . $data['adress'] . '", "' . $data['postal_code'] .
		 '", "' . $data['city'] . '", "' . $data['cellphone'] . '", "' .
		 $data['cellphone_father'] . '", "' .
		 $data['cellphone_mother'] . '", "' . $data['phone'] . '", "' .
		 $data['email'] . '", "' . $data['means_of_knowledge'] .
		 '", "' . $data['volunteer'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$member_id = get_member_id_from_name($data['first_name'],
					     $data['last_name']);
	display_entity('member', $member_id);
}

function add_entity_order($link, $data)
{
	$query = 'INSERT INTO `order` VALUES ("", "' . $data['member_id'] .
		 '", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$order_id = get_order_id_from_info($data['member_id']);
	display_entity('order', $order_id);
}

function add_entity_order_content($link, $data)
{
	update_goody_stock($link, $data['goody_id'], - $data['quantity']);

	$query = 'INSERT INTO order_content VALUES ("' . $data['order_id'] .
		 '", "' . $data['goody_id'] . '", "' . $data['quantity'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('order', $data['order_id']);
}

function add_entity_payment($link, $table, $data)
{
	$query = 'INSERT INTO ' . $table . '_payment VALUES ("", "' .
		 $data[$table . '_id'] . '", "' . $data['amount'] . '", "' .
		 $data['mode'] . '", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity($table, $data[$table . '_id']);
}

function add_entity_registration($link, $data)
{
	$query = 'INSERT INTO registration VALUES ("", "' . $data['member_id'] .
		 '", "' . $data['season'] . '", "' . $data['price'] . '", "' .
		 $data['discount'] . '", "' . $data['num_payments'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$registration_id = get_registration_id_from_info($data['member_id'],
							 $data['season']);
	add_registration_file($link, $registration_id);

	display_entity('registration', $registration_id);
}

function add_entity_registration_detail($link, $data)
{
	$query = 'INSERT INTO registration_detail VALUES ("' .
		 $data['registration_id'] . '", "' . $data['lesson_id'] .
		 '", "' . $data['show_participation'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('registration', $data['registration_id']);
}

function add_entity_room($link, $data)
{
	$query = 'INSERT INTO room VALUES ("", "' . $data['name'] . '", "' .
		 $data['adress'] . '", "' . $data['postal_code'] . '", "' .
		 $data['city'] . '", "")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$room_id = get_room_id_from_name($data['name']);
	display_entity('room', $room_id);
}

function add_entity_teacher($link, $data)
{
	$query = 'INSERT INTO teacher VALUES ("", "' . $data['first_name'] .
		 '", "' . $data['last_name'] . '", "' . $data['birth_date'] .
		 '", "' . $data['adress'] . '", "' . $data['postal_code'] .
		 '", "' . $data['city'] . '", "' . $data['cellphone'] . '", "' .
		 $data['phone'] . '", "' . $data['email'] . '", "")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$teacher_id = get_teacher_id_from_name($data['first_name'],
					       $data['last_name']);
	display_entity('teacher', $teacher_id);
}

function add_entity($table, $data)
{
	$link = connect_database();

	switch ($table) {
	case 'goody':
		add_entity_goody($link, $data);
		break;
	case 'lesson':
		add_entity_lesson($link, $data);
		break;
	case 'member':
		add_entity_member($link, $data);
		break;
	case 'order':
		add_entity_order($link, $data);
		break;
	case 'order_content':
		add_entity_order_content($link, $data);
		break;
	case 'order_payment':
		add_entity_payment($link, 'order', $data);
		break;
	case 'registration':
		add_entity_registration($link, $data);
		break;
	case 'registration_detail':
		add_entity_registration_detail($link, $data);
		break;
	case 'registration_payment':
		add_entity_payment($link, 'registration', $data);
		break;
	case 'room':
		add_entity_room($link, $data);
		break;
	case 'teacher':
		add_entity_teacher($link, $data);
		break;
	}

	mysqli_close($link);
}

/*
 * Forms for entity modification
 */
function form_modify_entity($table, $id)
{
	$ref_table = $table;

	if ($table == 'registration_file')
		$ref_table = 'registration';

	$link = connect_database();

	$query = 'SELECT * FROM `' . $table . '` WHERE ' . $ref_table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	require 'views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'views/form_modify_goody.html.php';
		break;
	case 'lesson':
		require 'views/form_modify_lesson.html.php';
		break;
	case 'member':
		require 'views/form_modify_member.html.php';
		break;
	case 'order':
		require 'views/form_modify_order.html.php';
		break;
	case 'order_payment':
		require 'views/form_modify_order_payment.html.php';
		break;
	case 'pre_registration':
		require 'views/form_modify_pre_registration.html.php';
		break;
	case 'registration':
		require 'views/form_modify_registration.html.php';
		break;
	case 'registration_file':
		require 'views/form_modify_registration_file.html.php';
		break;
	case 'registration_payment':
		require 'views/form_modify_registration_payment.html.php';
		break;
	case 'room':
		require 'views/form_modify_room.html.php';
		break;
	case 'teacher':
		require 'views/form_modify_teacher.html.php';
		break;
	}

	require 'views/footer.html.php';
}

/*
 * Modification of entity
 */
function modify_entity_goody($link, $goody_id, $data)
{
	$query = 'UPDATE goody SET name = "' . $data['name'] .
		 '", description = "' . $data['description'] . '", price = "' .
		 $data['price'] . '", stock = "' . $data['stock'] .
		 '" WHERE goody_id = ' . $goody_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('goody', $goody_id);
}

function modify_entity_lesson($link, $lesson_id, $data)
{
	$query = 'UPDATE lesson SET title =  "' . $data['title'] .
		 '", teacher_id = "' . $data['teacher_id'] . '", day = "' .
		 $data['day'] . '", start_time = "' . $data['start_time'] .
		 '", end_time = "' . $data['end_time'] . '", room_id = "' .
		 $data['room_id'] . '", costume = "' . $data['costume'] .
		 '", t_shirt = "' . $data['t_shirt'] . '" WHERE lesson_id = ' .
		 $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('lesson', $lesson_id);
}

function modify_entity_member($link, $member_id, $data)
{
	$query = 'UPDATE member SET first_name = "' . $data['first_name'] .
		 '", last_name = "' . $data['last_name'] . '", birth_date = "' .
		 $data['birth_date'] . '", adress = "' . $data['adress'] .
		 '", postal_code = "' . $data['postal_code'] . '", city = "' .
		 $data['city'] . '", cellphone = "' . $data['cellphone'] .
		 '", cellphone_father = "' . $data['cellphone_father'] .
		 '", cellphone_mother = "' . $data['cellphone_mother'] .
		 '", phone = "' . $data['phone'] . '", email = "' .
		 $data['email'] . '", means_of_knowledge = "' .
		 $data['means_of_knowledge'] . '", volunteer = "' .
		 $data['volunteer'] . '" WHERE member_id = ' . $member_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('member', $member_id);
}

function modify_entity_order($link, $order_id, $data)
{
	$query = 'UPDATE `order` SET member_id = "' . $data['member_id'] .
		 '" WHERE order_id = ' . $order_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('order', $order_id);
}

function modify_entity_payment($link, $table, $id, $data)
{
	$query = 'UPDATE ' . $table . '_payment SET amount = "' .
		 $data['amount'] . '", mode = "' . $data['mode'] .
		 '" WHERE ' . $table . '_payment_id = ' . $id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity($table, $data[$table . '_id']);
}

function modify_entity_pre_registration($link, $pre_registration_id, $data)
{
	$lessons_str = lessons_to_string($data);

	$query = 'UPDATE pre_registration SET first_name = "' .
		 $data['first_name'] . '", last_name = "' . $data['last_name'] .
		 '", birth_date = "' . $data['birth_date'] . '", adress = "' .
		 $data['adress'] . '", postal_code = "' . $data['postal_code'] .
		 '", city = "' . $data['city'] . '", cellphone = "' .
		 $data['cellphone'] . '", cellphone_father = "' .
		 $data['cellphone_father'] . '", cellphone_mother = "' .
		 $data['cellphone_mother'] . '", phone = "' . $data['phone'] .
		 '", email = "' . $data['email'] . '", lessons = "' .
		 $lessons_str . '", means_of_knowledge = "' .
		 $data['means_of_knowledge'] .
		 '" WHERE pre_registration_id = ' . $pre_registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('pre_registration', $pre_registration_id);
}

function modify_entity_registration($link, $registration_id, $data)
{
	$query = 'UPDATE registration SET season = "' . $data['season'] .
		 '", price = "' . $data['price'] . '", discount = "' .
		 $data['discount'] . '", num_payments = "' .
		 $data['num_payments'] . '" WHERE registration_id = ' .
		 $registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('registration', $registration_id);
}

function modify_entity_registration_file($link, $registration_id, $data)
{
	$query = 'UPDATE registration_file SET medical_certificate = "' .
		 $data['medical_certificate'] . '", insurance = "' .
		 $data['insurance'] . '", photo = "' . $data['photo'] .
		 '" WHERE registration_id = ' . $registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('registration', $data['registration_id']);
}

function modify_entity_room($link, $room_id, $data)
{
	$query = 'UPDATE room SET name = "' . $data['name'] . '", adress = "' .
		 $data['adress'] . '", postal_code = "' . $data['postal_code'] .
		 '", city = "' . $data['city'] . '" WHERE room_id = ' .
		 $room_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('room', $room_id);
}

function modify_entity_teacher($link, $teacher_id, $data)
{
	$query = 'UPDATE teacher SET first_name = "' . $data['first_name'] .
		 '", last_name = "' . $data['last_name'] . '", birth_date = "' .
		 $data['birth_date'] . '", adress = "' . $data['adress'] .
		 '", postal_code = "' . $data['postal_code'] . '", city = "' .
		 $data['city'] . '", cellphone = "' . $data['cellphone'] .
		 '", phone = "' . $data['phone'] . '", email = "' .
		 $data['email'] . '" WHERE teacher_id = ' . $teacher_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('teacher', $teacher_id);
}

function modify_entity($table, $id, $data)
{
	$link = connect_database();

	switch($table) {
	case 'goody':
		modify_entity_goody($link, $id, $data);
		break;
	case 'lesson':
		modify_entity_lesson($link, $id, $data);
		break;
	case 'member':
		modify_entity_member($link, $id, $data);
		break;
	case 'order':
		modify_entity_order($link, $id, $data);
		break;
	case 'order_payment':
		modify_entity_payment($link, 'order', $id, $data);
		break;
	case 'pre_registration':
		modify_entity_pre_registration($link, $id, $data);
		break;
	case 'registration':
		modify_entity_registration($link, $id, $data);
		break;
	case 'registration_file':
		modify_entity_registration_file($link, $id, $data);
		break;
	case 'registration_payment':
		modify_entity_payment($link, 'registration', $id, $data);
		break;
	case 'room':
		modify_entity_room($link, $id, $data);
		break;
	case 'teacher':
		modify_entity_teacher($link, $id, $data);
		break;
	}

	mysqli_close($link);
}

/*
 * Deletion of entity
 */
function delete_entity($table, $id, $first_call)
{
	if (isset($first_call) && $first_call) {
		switch ($table) {
		case 'order_payment':
			$order_id = get_order_id($id);
			break;
		case 'registration':
			$member_id = get_member_id($id);
			break;
		case 'registration_payment':
			$registration_id = get_registration_id($id);
			break;
		}
	}

	$link = connect_database();

	check_dependencies($link, $table, $id);

	$query = 'DELETE FROM `' . $table . '` WHERE ' . $table . '_id = ' .
		 $id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	if (isset($first_call) && $first_call) {
		switch ($table) {
		case 'order_payment':
			display_entity('order', $order_id);
			break;
		case 'registration':
			display_entity('member', $member_id);
			break;
		case 'registration_payment':
			display_entity('registration', $registration_id);
			break;
		default:
			display_table($table);
			break;
		}
	}
}

/*
 * Functions related to order content
 */
function modify_quantity($order_id, $goody_id, $quantity)
{
	$link = connect_database();

	if ($quantity <= 0 || !is_numeric($quantity)) {
		$query = 'DELETE FROM order_content WHERE order_id = ' .
			 $order_id . ' AND goody_id = ' . $goody_id;
		$quantity = 0;
	} else {
		$query = 'UPDATE order_content SET quantity = "' . $quantity .
			 '" WHERE order_id = ' . $order_id .
			 ' AND goody_id = ' . $goody_id;
	}

	$old_quantity = get_order_content_quantity($order_id, $goody_id);
	$difference = $old_quantity - $quantity;
	update_goody_stock($link, $goody_id, $difference);

	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	display_entity('order', $order_id);
}

function empty_cart($order_id)
{
	$link = connect_database();

	update_goody_stock_by_order($link, $order_id);

	$query = 'DELETE FROM order_content WHERE order_id = ' . $order_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	display_entity('order', $order_id);
}

/*
 * Functions related to registration detail
 */
function toggle_show_participation($registration_id, $lesson_id)
{
	$link = connect_database();

	$query = 'UPDATE registration_detail ' .
		 'SET show_participation = NOT show_participation ' .
		 'WHERE registration_id = ' . $registration_id .
		 ' AND lesson_id = ' . $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	display_entity('registration', $registration_id);
}

function remove_lesson($registration_id, $lesson_id)
{
	$link = connect_database();

	$query = 'DELETE FROM registration_detail WHERE registration_id = ' .
		 $registration_id . ' AND lesson_id = ' . $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	display_entity('registration', $registration_id);
}
?>

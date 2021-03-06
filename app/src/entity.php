<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

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

	$row = html_encode_strings($row);

	require 'app/views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'app/views/goody.html.php';
		break;
	case 'lesson':
		require 'app/views/lesson.html.php';
		break;
	case 'member':
		require 'app/views/member.html.php';
		break;
	case 'order':
		require 'app/views/order.html.php';
		break;
	case 'pre_registration':
		require 'app/views/pre_registration.html.php';
		break;
	case 'registration':
		$name = get_name('member', $row['member_id']);
		require 'app/views/registration.html.php';
		break;
	case 'room':
		require 'app/views/room.html.php';
		break;
	case 'teacher':
		require 'app/views/teacher.html.php';
		break;
	}

	require 'app/views/footer.html.php';

	mysqli_close($link);
}

/*
 * Forms for entity add
 */
function form_add_entity($table, $id)
{
	require 'app/views/header.html.php';

	switch ($table) {
	case 'goody':
		require 'app/views/form_add_goody.html.php';
		break;
	case 'lesson':
		require 'app/views/form_add_lesson.html.php';
		break;
	case 'member':
		require 'app/views/form_add_member.html.php';
		break;
	case 'order':
		require 'app/views/form_add_order.html.php';
		break;
	case 'order_content':
		$order_id = $id;
		require 'app/views/form_add_order_content.html.php';
		break;
	case 'order_payment':
		$order_id = $id;
		require 'app/views/form_add_order_payment.html.php';
		break;
	case 'registration':
		$member_id = $id;
		$name = get_name('member', $id);
		require 'app/views/form_add_registration.html.php';
		break;
	case 'registration_detail':
		$registration_id = $id;
		$member_id = get_member_id($id);
		$name = get_name('member', $member_id);
		$season = get_registration_season($id);
		require 'app/views/form_add_registration_detail.html.php';
		break;
	case 'registration_payment':
		$registration_id = $id;
		$member_id = get_member_id($id);
		$name = get_name('member', $member_id);
		$season = get_registration_season($id);
		require 'app/views/form_add_registration_payment.html.php';
		break;
	case 'room':
		require 'app/views/form_add_room.html.php';
		break;
	case 'teacher':
		require 'app/views/form_add_teacher.html.php';
		break;
	case 'user':
		if ($_SESSION['admin'])
			require 'app/views/form_add_user.html.php';
		break;
	}

	require 'app/views/footer.html.php';
}

/*
 * Add of entity
 */
function add_goody($data)
{
	prepare_data_goody($data);

	$link = connect_database();

	$query = 'INSERT INTO goody (name, description, price, stock) ' .
		 'VALUES ("' . $data['name'] . '", "' . $data['description'] .
		 '", ' . $data['price'] . ', ' . $data['stock'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$goody_id = get_goody_id_from_name($data['name']);
	redirect('goody', $goody_id);
}

function add_lesson($data)
{
	list($start_time, $end_time) = prepare_data_lesson($data);

	$link = connect_database();

	$query = 'INSERT INTO lesson (title, teacher_id, day, start_time, ' .
		 'end_time, room_id, costume) VALUES ("' . $data['title'] .
		 '", ' . $data['teacher_id'] . ', ' . $data['day'] . ', ' .
		 $start_time . ', ' . $end_time . ', ' . $data['room_id'] .
		 ', "' . $data['costume'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$lesson_id = get_lesson_id_from_title($data['title']);
	redirect('lesson', $lesson_id);
}

function add_member($data)
{
	list($birth_date, $cellphone, $cellphone_father, $cellphone_mother,
	     $phone) = prepare_data_member($data);

	$link = connect_database();

	$query = 'INSERT INTO member (first_name, last_name, birth_date, ' .
		 'address, postal_code, city, cellphone, cellphone_father, ' .
		 'cellphone_mother, phone, email, means_of_knowledge, ' .
		 'creation_date) VALUES ("' . $data['first_name'] . '", "' .
		 $data['last_name'] . '", "' . $birth_date . '", "' .
		 $data['address'] . '", "' . $data['postal_code'] . '", "' .
		 $data['city'] . '", "' . $cellphone . '", "' .
		 $cellphone_father . '", "' . $cellphone_mother . '", "' .
		 $phone . '", "' . $data['email'] . '", "' .
		 $data['means_of_knowledge'] . '", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$member_id = get_member_id_from_name($data['first_name'],
					     $data['last_name']);
	redirect('member', $member_id);
}

function add_order($data)
{
	$link = connect_database();

	$query = 'INSERT INTO `order` (member_id, date) VALUES (' .
		 $data['member_id'] . ', NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$order_id = get_order_id_from_info($data['member_id']);
	redirect('order', $order_id);
}

function add_order_content($data)
{
	$link = connect_database();

	update_goody_stock($link, $data['goody_id'], - $data['quantity']);

	$query = 'INSERT INTO order_content (order_id, goody_id, quantity) ' .
		 'VALUES (' . $data['order_id'] . ', ' . $data['goody_id'] .
		 ', ' . $data['quantity'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('order', $data['order_id']);
}

function add_payment($table, $data)
{
	$cashing_date = prepare_data_payment($data);

	$link = connect_database();

	$query = 'INSERT INTO ' . $table . '_payment (' . $table . '_id, ' .
		 'amount, mode, cashing_date, comment, date) VALUES (' .
		 $data[$table . '_id'] . ', ' . $data['amount'] . ', "' .
		 $data['mode'] . '", "' . $cashing_date . '", "' .
		 $data['comment'] . '", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect($table, $data[$table . '_id']);
}

function add_registration($data)
{
	$followed_quarters_str = prepare_data_registration($data);

	$link = connect_database();

	$query = 'INSERT INTO registration (member_id, season, plan, ' .
		 'followed_quarters, price, discount, num_payments, comment, ' .
		 'date) VALUES (' . $data['member_id'] . ', "' .
		 $data['season'] . '", ' . $data['plan'] . ', "' .
		 $followed_quarters_str . '", ' . $data['price'] . ', ' .
		 $data['discount'] . ', ' . $data['num_payments'] . ', "' .
		 $data['comment'] . '", NOW())';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$registration_id = get_registration_id_from_info($data['member_id'],
							 $data['season']);
	add_registration_file($link, $registration_id);

	mysqli_close($link);

	redirect('registration', $registration_id);
}

function add_registration_detail($data)
{
	$link = connect_database();

	$query = 'INSERT INTO registration_detail (registration_id, ' .
		 'lesson_id) VALUES (' . $data['registration_id'] . ', ' .
		 $data['lesson_id'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('registration', $data['registration_id']);
}

function add_room($data)
{
	$link = connect_database();

	$query = 'INSERT INTO room (name, address, postal_code, city) ' .
		 'VALUES ("' . $data['name'] . '", "' . $data['address'] .
		 '", "' . $data['postal_code'] . '", "' . $data['city'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$room_id = get_room_id_from_name($data['name']);
	redirect('room', $room_id);
}

function add_teacher($data)
{
	list($birth_date, $cellphone, $phone) = prepare_data_teacher($data);

	$link = connect_database();

	$query = 'INSERT INTO teacher (first_name, last_name, birth_date, ' .
		 'address, postal_code, city, cellphone, phone, email) ' .
		 'VALUES ("' . $data['first_name'] . '", "' .
		 $data['last_name'] . '", ' . $birth_date . ', "' .
		 $data['address'] . '", "' . $data['postal_code'] . '", "' .
		 $data['city'] . '", "' . $cellphone . '", "' . $phone .
		 '", "' . $data['email'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$teacher_id = get_teacher_id_from_name($data['first_name'],
					       $data['last_name']);
	redirect('teacher', $teacher_id);
}

function add_user($data)
{
	if (!$_SESSION['admin'])
		return;

	prepare_data_user($data);

	$password = generate_password();

	$link = connect_database();

	$query = 'INSERT INTO user (username, password, admin) VALUES ("' .
		 $data['username'] . '", "' . hash('sha512', $password) .
		 '", ' . $data['admin'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$_SESSION['new_password'] = $password;

	redirect_after_add_user();
}

function add_entity($table, $data)
{
	switch ($table) {
	case 'goody':
		add_goody($data);
		break;
	case 'lesson':
		add_lesson($data);
		break;
	case 'member':
		add_member($data);
		break;
	case 'order':
		add_order($data);
		break;
	case 'order_content':
		add_order_content($data);
		break;
	case 'order_payment':
		add_payment('order', $data);
		break;
	case 'registration':
		add_registration($data);
		break;
	case 'registration_detail':
		add_registration_detail($data);
		break;
	case 'registration_payment':
		add_payment('registration', $data);
		break;
	case 'room':
		add_room($data);
		break;
	case 'teacher':
		add_teacher($data);
		break;
	case 'user':
		add_user($data);
		break;
	}
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

	$row = html_encode_strings($row);

	require 'app/views/header.html.php';

	switch ($table) {
	case 'goody':
		$name = get_entity_name('goody', $row['goody_id']);
		require 'app/views/form_modify_goody.html.php';
		break;
	case 'lesson':
		$title = get_lesson_title($row['lesson_id']);
		require 'app/views/form_modify_lesson.html.php';
		break;
	case 'member':
		$name = get_name('member', $row['member_id']);
		require 'app/views/form_modify_member.html.php';
		break;
	case 'order_payment':
		$order_id = $row['order_id'];
		require 'app/views/form_modify_order_payment.html.php';
		break;
	case 'pre_registration':
		$name = get_name('pre_registration',
				 $row['pre_registration_id']);
		require 'app/views/form_modify_pre_registration.html.php';
		break;
	case 'registration':
		$member_id = $row['member_id'];
		$name = get_name('member', $row['member_id']);
		$season = get_registration_season($row['registration_id']);
		require 'app/views/form_modify_registration.html.php';
		break;
	case 'registration_file':
		$registration_id = $row['registration_id'];
		$member_id = get_member_id($row['registration_id']);
		$name = get_name('member', $member_id);
		$season = get_registration_season($row['registration_id']);
		require 'app/views/form_modify_registration_file.html.php';
		break;
	case 'registration_payment':
		$registration_id = $row['registration_id'];
		$member_id = get_member_id($row['registration_id']);
		$name = get_name('member', $member_id);
		$season = get_registration_season($row['registration_id']);
		require 'app/views/form_modify_registration_payment.html.php';
		break;
	case 'room':
		$name = get_entity_name('room', $row['room_id']);
		require 'app/views/form_modify_room.html.php';
		break;
	case 'teacher':
		$name = get_name('teacher', $row['teacher_id']);
		require 'app/views/form_modify_teacher.html.php';
		break;
	}

	require 'app/views/footer.html.php';
}

/*
 * Modification of entity
 */
function modify_goody($goody_id, $data)
{
	prepare_data_goody($data);

	$link = connect_database();

	$query = 'UPDATE goody SET name = "' . $data['name'] .
		 '", description = "' . $data['description'] . '", price = ' .
		 $data['price'] . ', stock = ' . $data['stock'] .
		 ' WHERE goody_id = ' . $goody_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('goody', $goody_id);
}

function modify_lesson($lesson_id, $data)
{
	list($start_time, $end_time) = prepare_data_lesson($data);

	$link = connect_database();

	$query = 'UPDATE lesson SET title =  "' . $data['title'] .
		 '", teacher_id = ' . $data['teacher_id'] . ', day = ' .
		 $data['day'] . ', start_time = ' . $start_time .
		 ', end_time = ' . $end_time . ', room_id = ' .
		 $data['room_id'] . ', costume = "' . $data['costume'] .
		 '" WHERE lesson_id = ' . $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('lesson', $lesson_id);
}

function modify_member($member_id, $data)
{
	list($birth_date, $cellphone, $cellphone_father, $cellphone_mother,
	     $phone) = prepare_data_member($data);

	$link = connect_database();

	$query = 'UPDATE member SET first_name = "' . $data['first_name'] .
		 '", last_name = "' . $data['last_name'] . '", birth_date = "' .
		 $birth_date . '", address = "' . $data['address'] .
		 '", postal_code = "' . $data['postal_code'] . '", city = "' .
		 $data['city'] . '", cellphone = "' . $cellphone .
		 '", cellphone_father = "' . $cellphone_father .
		 '", cellphone_mother = "' . $cellphone_mother .
		 '", phone = "' . $phone . '", email = "' . $data['email'] .
		 '", means_of_knowledge = "' . $data['means_of_knowledge'] .
		 '" WHERE member_id = ' . $member_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('member', $member_id);
}

function modify_payment($table, $id, $data)
{
	$cashing_date = prepare_data_payment($data);

	$link = connect_database();

	$query = 'UPDATE ' . $table . '_payment SET amount = ' .
		 $data['amount'] . ', mode = "' . $data['mode'] .
		 '", cashing_date = "' . $cashing_date . '", comment = "' .
		 $data['comment'] . '" WHERE ' . $table . '_payment_id = ' .
		 $id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect($table, $data[$table . '_id']);
}

function modify_pre_registration($pre_registration_id, $data)
{
	list($birth_date, $cellphone, $cellphone_father, $cellphone_mother,
	     $phone) = prepare_data_pre_registration($data);

	$lessons_str = '';

	if ($data['with_lessons'])
		$lessons_str = lessons_to_string($data);

	$link = connect_database();

	$query = 'UPDATE pre_registration SET first_name = "' .
		 $data['first_name'] . '", last_name = "' . $data['last_name'] .
		 '", birth_date = "' . $birth_date . '", address = "' .
		 $data['address'] . '", postal_code = "' .
		 $data['postal_code'] . '", city = "' . $data['city'] .
		 '", cellphone = "' . $cellphone . '", cellphone_father = "' .
		 $cellphone_father . '", cellphone_mother = "' .
		 $cellphone_mother . '", phone = "' . $phone . '", email = "' .
		 $data['email'] . '", with_lessons = ' . $data['with_lessons'] .
		 ', lessons = "' . $lessons_str . '", plan = ' . $data['plan'] .
		 ', means_of_knowledge = "' . $data['means_of_knowledge'] .
		 '" WHERE pre_registration_id = ' . $pre_registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('pre_registration', $pre_registration_id);
}

function modify_registration($registration_id, $data)
{
	$followed_quarters_str = prepare_data_registration($data);

	$link = connect_database();

	$query = 'UPDATE registration SET plan = ' . $data['plan'] .
		 ', followed_quarters = "' . $followed_quarters_str .
		 '", price = ' . $data['price'] . ', discount = ' .
		 $data['discount'] . ', num_payments = ' .
		 $data['num_payments'] . ', comment = "' . $data['comment'] .
		 '" WHERE registration_id = ' . $registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('registration', $registration_id);
}

function modify_registration_file($registration_id, $data)
{
	$link = connect_database();

	$query = 'UPDATE registration_file SET medical_certificate = ' .
		 $data['medical_certificate'] . ', insurance = ' .
		 $data['insurance'] . ', photo = ' . $data['photo'] .
		 ', stamped_envelope = ' . $data['stamped_envelope'] .
		 ' WHERE registration_id = ' . $registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('registration', $registration_id);
}

function modify_room($room_id, $data)
{
	$link = connect_database();

	$query = 'UPDATE room SET name = "' . $data['name'] . '", address = "' .
		 $data['address'] . '", postal_code = "' .
		 $data['postal_code'] . '", city = "' . $data['city'] .
		 '" WHERE room_id = ' . $room_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('room', $room_id);
}

function modify_teacher($teacher_id, $data)
{
	list($birth_date, $cellphone, $phone) = prepare_data_teacher($data);

	$link = connect_database();

	$query = 'UPDATE teacher SET first_name = "' . $data['first_name'] .
		 '", last_name = "' . $data['last_name'] . '", birth_date = ' .
		 $birth_date . ', address = "' . $data['address'] .
		 '", postal_code = "' . $data['postal_code'] . '", city = "' .
		 $data['city'] . '", cellphone = "' . $cellphone .
		 '", phone = "' . $phone . '", email = "' . $data['email'] .
		 '" WHERE teacher_id = ' . $teacher_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('teacher', $teacher_id);
}

function modify_entity($table, $id, $data)
{
	switch($table) {
	case 'goody':
		modify_goody($id, $data);
		break;
	case 'lesson':
		modify_lesson($id, $data);
		break;
	case 'member':
		modify_member($id, $data);
		break;
	case 'order_payment':
		modify_payment('order', $id, $data);
		break;
	case 'pre_registration':
		modify_pre_registration($id, $data);
		break;
	case 'registration':
		modify_registration($id, $data);
		break;
	case 'registration_file':
		modify_registration_file($id, $data);
		break;
	case 'registration_payment':
		modify_payment('registration', $id, $data);
		break;
	case 'room':
		modify_room($id, $data);
		break;
	case 'teacher':
		modify_teacher($id, $data);
		break;
	}
}

/*
 * Deletion of entity
 */
function delete_entity($table, $id, $first_call = false)
{
	if ($first_call) {
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

	if ($first_call) {
		switch ($table) {
		case 'order_payment':
			redirect('order', $order_id);
			break;
		case 'registration':
			redirect('member', $member_id);
			break;
		case 'registration_payment':
			redirect('registration', $registration_id);
			break;
		default:
			redirect($table);
			break;
		}
	}
}

/*
 * Function related to member
 */
function toggle_volunteer($member_id)
{
	$link = connect_database();

	$query = 'UPDATE member SET volunteer = NOT volunteer ' .
		 'WHERE member_id = ' . $member_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('member', $member_id);
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
		$query = 'UPDATE order_content SET quantity = ' . $quantity .
			 ' WHERE order_id = ' . $order_id .
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

	redirect('order', $order_id);
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

	redirect('order', $order_id);
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

	redirect('registration', $registration_id);
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

	redirect('registration', $registration_id);
}

/*
 * Functions related to teacher
 */
function update_absences($teacher_id)
{
	$link = connect_database();

	$query = 'UPDATE teacher SET absences = absences + 1 ' .
		 'WHERE teacher_id = ' . $teacher_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('teacher', $teacher_id);
}

function reset_absences($teacher_id)
{
	$link = connect_database();

	$query = 'UPDATE teacher SET absences = 0 WHERE teacher_id = ' .
		 $teacher_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('teacher', $teacher_id);
}

/*
 * Functions related to user
 */
function toggle_admin($username)
{
	if (!$_SESSION['admin'] || $username == $_SESSION['username'])
		return;

	$link = connect_database();

	$query = 'UPDATE user SET admin = NOT admin WHERE username = "' .
		 $username . '"';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('user');
}

function reset_password($username)
{
	if (!$_SESSION['admin'] || $username == $_SESSION['username'])
		return;

	$password = generate_password();

	$link = connect_database();

	$query = 'UPDATE user SET password = "' . hash('sha512', $password) .
		 '" WHERE username = "' . $username .'"';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	$_SESSION['new_password'] = $password;

	redirect_after_reset_password();
}

function delete_user($username)
{
	if (!$_SESSION['admin'] || $username == $_SESSION['username'])
		return;

	$link = connect_database();

	$query = 'DELETE FROM user WHERE username = "' . $username .'"';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect('user');
}

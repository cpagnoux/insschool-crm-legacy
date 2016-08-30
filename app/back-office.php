<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

set_include_path(__DIR__);

require_once 'src/login.php';
require_once 'src/mail.php';
require_once 'src/util.php';

require_once 'src/table.php';
require_once 'src/entity.php';
require_once 'src/pre-registration.php';

session_start();

if (isset($_POST['member_filter']))
	$_SESSION['member_filter'] = $_POST['member_filter'];
if (isset($_POST['order_filter_by_member']))
	$_SESSION['order_filter_by_member'] = $_POST['order_filter_by_member'];
if (isset($_POST['order_filter']))
	$_SESSION['order_filter'] = $_POST['order_filter'];
if (isset($_POST['goody_sorting']))
	$_SESSION['goody_sorting'] = $_POST['goody_sorting'];
if (isset($_POST['lesson_sorting']))
	$_SESSION['lesson_sorting'] = $_POST['lesson_sorting'];
if (isset($_POST['order_sorting']))
	$_SESSION['order_sorting'] = $_POST['order_sorting'];
if (isset($_POST['person_sorting']))
	$_SESSION['person_sorting'] = $_POST['person_sorting'];
if (isset($_POST['room_sorting']))
	$_SESSION['room_sorting'] = $_POST['room_sorting'];

if (isset($_POST['limit']))
	$_SESSION['limit'] = $_POST['limit'];

$action = '';

if (!session_valid()) {
	$action = 'login';
} else if (isset($_GET['status'])) {
	switch ($_GET['action']) {
	case 'reset_password':
		$action = 'status_reset_password';
		break;
	case 'send_mail':
		$action = 'status_send_mail';
		break;
	case 'send_ticket':
		$action = 'status_send_ticket';
		break;
	case 'change_password':
		$action = 'status_change_password';
		break;
	}
} else if (isset($_POST['submit'])) {
	switch ($_GET['action']) {
	case 'add':
		$action = 'add_entity';
		break;
	case 'modify':
		$action = 'modify_entity';
		break;
	case 'send_mail':
		$action = 'send_mail';
		break;
	case 'send_ticket':
		$action = 'send_ticket';
		break;
	case 'change_password':
		$action = 'change_password';
		break;
	}
} else if (isset($_GET['action'])) {
	switch ($_GET['action']) {
	case 'reset_filters':
		$action = 'reset_filters';
		break;
	case 'add':
		$action = 'form_add_entity';
		break;
	case 'modify':
		$action = 'form_modify_entity';
		break;
	case 'delete':
		$action = 'delete_entity';
		break;
	case 'toggle_volunteer':
		$action = 'toggle_volunteer';
		break;
	case 'modify_quantity':
		$action = 'modify_quantity';
		break;
	case 'empty_cart':
		$action = 'empty_cart';
		break;
	case 'commit':
		$action = 'commit_pre_registration';
		break;
	case 'toggle_show_participation':
		$action = 'toggle_show_participation';
		break;
	case 'remove_lesson':
		$action = 'remove_lesson';
		break;
	case 'update_absences':
		$action = 'update_absences';
		break;
	case 'reset_absences':
		$action = 'reset_absences';
		break;
	case 'toggle_admin':
		$action = 'toggle_admin';
		break;
	case 'reset_password':
		$action = 'reset_password';
		break;
	case 'delete_user':
		$action = 'delete_user';
		break;
	case 'send_mail':
		$action = 'form_send_mail';
		break;
	case 'send_ticket':
		$action = 'form_send_ticket';
		break;
	case 'change_password':
		$action = 'form_change_password';
		break;
	case 'logout':
		$action = 'logout';
		break;
	}
} else if (isset($_GET['id'])) {
	$action = 'display_entity';
} else if (isset($_GET['table'])) {
	$action = 'display_table';
}

switch ($action) {
case 'login':
	require 'views/login.html.php';
	require 'views/footer.html.php';
	break;
case 'display_table':
	display_table($_GET['table'], $_GET['page']);
	break;
case 'reset_filters':
	reset_filters($_GET['table']);
	break;
case 'display_entity':
	display_entity($_GET['table'], $_GET['id']);
	break;
case 'form_add_entity':
	form_add_entity($_GET['table'], $_GET['id']);
	break;
case 'add_entity':
	add_entity($_GET['table'], $_POST);
	break;
case 'form_modify_entity':
	form_modify_entity($_GET['table'], $_GET['id']);
	break;
case 'modify_entity':
	modify_entity($_GET['table'], $_GET['id'], $_POST);
	break;
case 'delete_entity':
	delete_entity($_GET['table'], $_GET['id'], true);
	break;
case 'toggle_volunteer':
	toggle_volunteer($_GET['member_id']);
	break;
case 'modify_quantity':
	if (isset($_GET['quantity']))
		modify_quantity($_GET['order_id'], $_GET['goody_id'],
				$_GET['quantity']);
	else
		modify_quantity($_GET['order_id'], $_GET['goody_id'],
				$_POST['quantity']);
	break;
case 'empty_cart':
	empty_cart($_GET['order_id']);
	break;
case 'commit_pre_registration':
	commit_pre_registration($_GET['pre_registration_id']);
	break;
case 'toggle_show_participation':
	toggle_show_participation($_GET['registration_id'], $_GET['lesson_id']);
	break;
case 'remove_lesson':
	remove_lesson($_GET['registration_id'], $_GET['lesson_id']);
	break;
case 'update_absences':
	update_absences($_GET['teacher_id']);
	break;
case 'reset_absences':
	reset_absences($_GET['teacher_id']);
	break;
case 'toggle_admin':
	toggle_admin($_GET['username']);
	break;
case 'reset_password':
	reset_password($_GET['username']);
	break;
case 'status_reset_password':
	require 'views/header.html.php';
	require 'views/status_reset_password.html.php';
	require 'views/footer.html.php';
	unset($_SESSION['new_password']);
	break;
case 'delete_user':
	delete_user($_GET['username']);
	break;
case 'form_send_mail':
	form_send_mail($_GET['to']);
	break;
case 'send_mail':
	send_mail($_GET['to']);
	break;
case 'status_send_mail':
	status_send_mail($_GET['to']);
	break;
case 'form_send_ticket':
	require 'views/header.html.php';
	require 'views/form_send_ticket.html.php';
	require 'views/footer.html.php';
	break;
case 'send_ticket':
	send_ticket($_POST['topic'], $_POST['message']);
	break;
case 'status_send_ticket':
	require 'views/header.html.php';
	require 'views/status_send_ticket.html.php';
	require 'views/footer.html.php';
	break;
case 'form_change_password':
	require 'views/header.html.php';
	require 'views/form_change_password.html.php';
	require 'views/footer.html.php';
	break;
case 'change_password':
	change_password($_POST['current_password'], $_POST['new_password'],
			$_POST['new_password_confirm']);
	break;
case 'status_change_password':
	require 'views/header.html.php';
	require 'views/status_change_password.html.php';
	require 'views/footer.html.php';
	break;
case 'logout':
	logout();
	break;
default:
	require 'views/header.html.php';
	require 'views/footer.html.php';
	break;
}
?>

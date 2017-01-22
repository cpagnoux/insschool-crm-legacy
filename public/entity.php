<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

set_include_path(__DIR__ . '/..');
define('PUBLIC_PATH', __DIR__);

require_once 'app/src/connection.php';
require_once 'app/src/session.php';
require_once 'app/src/login.php';
require_once 'app/src/util.php';

require_once 'app/src/entity.php';
require_once 'app/src/pre-registration.php';

$_GET = sql_escape_strings($_GET);
$_POST = sql_escape_strings($_POST);

init_session();

if (!session_valid())
	redirect_login();

$action = '';

if (isset($_GET['status']))
	$action = 'status_' . $_GET['action'];
else if (isset($_POST['submit']))
	$action = 'submit_' . $_GET['action'];
else if (isset($_GET['action']))
	$action = $_GET['action'];

switch ($action) {
case 'add':
	form_add_entity($_GET['table'], $_GET['id']);
	break;
case 'submit_add':
	add_entity($_GET['table'], $_POST);
	break;
case 'modify':
	form_modify_entity($_GET['table'], $_GET['id']);
	break;
case 'submit_modify':
	modify_entity($_GET['table'], $_GET['id'], $_POST);
	break;
case 'delete':
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
case 'commit':
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
case 'status_add_user':
	require 'app/views/header.html.php';
	require 'app/views/status_add_user.html.php';
	require 'app/views/footer.html.php';
	unset($_SESSION['new_password']);
	break;
case 'toggle_admin':
	toggle_admin($_GET['username']);
	break;
case 'reset_password':
	reset_password($_GET['username']);
	break;
case 'status_reset_password':
	require 'app/views/header.html.php';
	require 'app/views/status_reset_password.html.php';
	require 'app/views/footer.html.php';
	unset($_SESSION['new_password']);
	break;
case 'delete_user':
	delete_user($_GET['username']);
	break;
default:
	display_entity($_GET['table'], $_GET['id']);
	break;
}

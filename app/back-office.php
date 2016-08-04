<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/login.php';

require_once 'src/table.php';
require_once 'src/entity.php';
require_once 'src/pre-registration.php';

session_start();

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

if (!session_valid())
	$action = 'login';
else if (isset($_GET['mode']) && $_GET['mode'] == 'logout')
	$action = 'logout';
else if (isset($_POST['submit']) && $_GET['mode'] == 'modify')
	$action = 'modify_entity';
else if (isset($_POST['submit']) && $_GET['mode'] == 'add')
	$action = 'add_entity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'update_absences')
	$action = 'update_absences';
else if (isset($_GET['mode']) && $_GET['mode'] == 'remove_lesson')
	$action = 'remove_lesson';
else if (isset($_GET['mode']) && $_GET['mode'] == 'toggle_show_participation')
	$action = 'toggle_show_participation';
else if (isset($_GET['mode']) && $_GET['mode'] == 'empty_cart')
	$action = 'empty_cart';
else if (isset($_GET['mode']) && $_GET['mode'] == 'modify_quantity')
	$action = 'modify_quantity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'commit')
	$action = 'commit_pre_registration';
else if (isset($_GET['mode']) && $_GET['mode'] == 'delete')
	$action = 'delete_entity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'modify')
	$action = 'form_modify_entity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'add')
	$action = 'form_add_entity';
else if (isset($_GET['id']))
	$action = 'display_entity';
else if (isset($_GET['table']))
	$action = 'display_table';

switch ($action) {
case 'update_absences':
	update_absences($_GET['teacher_id']);
	break;
case 'remove_lesson':
	remove_lesson($_GET['registration_id'], $_GET['lesson_id']);
	break;
case 'toggle_show_participation':
	toggle_show_participation($_GET['registration_id'], $_GET['lesson_id']);
	break;
case 'empty_cart':
	empty_cart($_GET['order_id']);
	break;
case 'modify_quantity':
	if (isset($_GET['quantity']))
		modify_quantity($_GET['order_id'], $_GET['goody_id'],
				$_GET['quantity']);
	else
		modify_quantity($_GET['order_id'], $_GET['goody_id'],
				$_POST['quantity']);
	break;
case 'commit_pre_registration':
	commit_pre_registration($_GET['id']);
	break;
case 'delete_entity':
	delete_entity($_GET['table'], $_GET['id'], true);
	break;
case 'modify_entity':
	modify_entity($_GET['table'], $_GET['id'], $_POST);
	break;
case 'form_modify_entity':
	form_modify_entity($_GET['table'], $_GET['id']);
	break;
case 'add_entity':
	add_entity($_GET['table'], $_POST);
	break;
case 'form_add_entity':
	form_add_entity($_GET['table'], $_GET['id']);
	break;
case 'display_entity':
	display_entity($_GET['table'], $_GET['id']);
	break;
case 'display_table':
	display_table($_GET['table'], $_GET['page']);
	break;
case 'logout':
	logout();
	break;
case 'login':
	require 'views/login.html.php';
	break;
default:
	require 'views/header.html.php';
	require 'views/footer.html.php';
	break;
}
?>

<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

set_include_path(__DIR__ . '/..');
define('PUBLIC_PATH', __DIR__);

require_once 'src/connection.php';
require_once 'src/session.php';
require_once 'src/login.php';
require_once 'src/util.php';

$_GET = sql_escape_strings($_GET);
$_POST = sql_escape_strings($_POST);

init_session();

if (!session_valid())
	redirect_login();

$action = '';

if (isset($_GET['status']))
	$action = 'status';
else if (isset($_POST['submit']))
	$action = 'submit';

switch ($action) {
case 'submit':
	change_password($_POST['current_password'], $_POST['new_password'],
			$_POST['new_password_confirm']);
	break;
case 'status':
	require 'views/header.html.php';
	require 'views/status_change_password.html.php';
	require 'views/footer.html.php';
	break;
default:
	require 'views/header.html.php';
	require 'views/form_change_password.html.php';
	require 'views/footer.html.php';
	break;
}

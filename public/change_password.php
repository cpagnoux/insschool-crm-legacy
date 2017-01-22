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
	require 'app/views/header.html.php';
	require 'app/views/status_change_password.html.php';
	require 'app/views/footer.html.php';
	break;
default:
	require 'app/views/header.html.php';
	require 'app/views/form_change_password.html.php';
	require 'app/views/footer.html.php';
	break;
}

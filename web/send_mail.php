<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

set_include_path(__DIR__ . '/..');

require_once 'src/connection.php';
require_once 'src/session.php';
require_once 'src/login.php';
require_once 'src/util.php';
require_once 'src/mail.php';

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
	send_mail($_GET['to']);
	break;
case 'status':
	status_send_mail($_GET['to']);
	break;
default:
	form_send_mail($_GET['to']);
	break;
}
?>

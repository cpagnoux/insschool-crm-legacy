<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
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

if (!session_valid()) {
	require 'app/views/login.html.php';
	exit;
}

$controller = '';

if (isset($_GET['controller']))
	$controller = $_GET['controller'];

switch ($controller) {
case 'change_password':
	require 'app/src/controllers/change_password.php';
	break;
case 'entity':
	require 'app/src/controllers/entity.php';
	break;
case 'generate_pdf':
	require 'app/src/controllers/generate_pdf.php';
	break;
case 'overview':
	require 'app/src/controllers/overview.php';
	break;
case 'send_mail':
	require 'app/src/controllers/send_mail.php';
	break;
case 'send_ticket':
	require 'app/src/controllers/send_ticket.php';
	break;
default:
	require 'app/src/controllers/index.php';
	break;
}

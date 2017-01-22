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

require_once 'app/src/table.php';

$_GET = sql_escape_strings($_GET);
$_POST = sql_escape_strings($_POST);

init_session();

if (!session_valid())
	redirect_login();

$action = '';

if (isset($_GET['action']))
	$action = $_GET['action'];

switch ($action) {
case 'reset_filters':
	reset_filters($_GET['table']);
	break;
default:
	display_table($_GET['table'], $_GET['page']);
	break;
}

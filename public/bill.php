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
require_once 'app/src/pdf.php';

$_GET = sql_escape_strings($_GET);
$_POST = sql_escape_strings($_POST);

init_session();

if (!session_valid())
	redirect_login();

generate_bill($_GET['registration_id']);

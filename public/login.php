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

if (session_valid())
	redirect_home();

require 'views/login.html.php';
require 'views/footer.html.php';

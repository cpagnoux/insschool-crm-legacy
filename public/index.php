<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

set_include_path(dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

require_once 'app/config/app.config.php';

require_once 'vendor/setasign/fpdf/fpdf.php';

// Core
require_once 'app/src/connection.php';
require_once 'app/src/entity.php';
require_once 'app/src/entity_helper.php';
require_once 'app/src/error.php';
require_once 'app/src/form.php';
require_once 'app/src/pre-registration.php';
require_once 'app/src/table.php';
require_once 'app/src/util.php';

// User session
require_once 'app/src/login.php';
require_once 'app/src/session.php';

// Email
require_once 'app/src/mail.php';

// PDF
require_once 'app/src/bill.php';
require_once 'app/src/call_sheet.php';
require_once 'app/src/pdf.php';

$_GET = sql_escape_strings($_GET);
$_POST = sql_escape_strings($_POST);

init_session();

if (!session_valid()) {
	require 'app/views/login.html.php';
	exit;
}

$controller = 'index';

if (isset($_GET['controller']))
	$controller = $_GET['controller'];

require 'app/src/controllers/' . $controller . '.php';

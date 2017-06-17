<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

set_include_path(dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

require_once 'app/config/app.config.php';

// Core
require_once 'app/src/database.php';
require_once 'app/src/entity.php';
require_once 'app/src/entity_helper.php';
require_once 'app/src/error.php';
require_once 'app/src/form.php';
require_once 'app/src/pre-registration.php';
require_once 'app/src/table.php';
require_once 'app/src/util.php';

$action = '';

if (isset($_POST['submit']))
	$action = 'submit';

require 'app/views/header_pre_registration.html.php';

switch ($action) {
case 'submit':
	$data = html_encode_strings($_POST);
	$_POST = sql_escape_strings($_POST);
	check_pre_registration($data);
	break;
default:
	require 'app/views/form_add_pre_registration.html.php';
	break;
}

require 'app/views/footer_pre_registration.html.php';

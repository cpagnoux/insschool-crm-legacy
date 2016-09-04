<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

set_include_path(__DIR__ . '/..');

require_once 'src/connection.php';
require_once 'src/util.php';

require_once 'src/pre-registration.php';

$action = '';

if (isset($_POST['submit']))
	$action = 'submit';

require 'views/header_pre_registration.html.php';

switch ($action) {
case 'submit':
	$data = html_encode_strings($_POST);
	$lessons_str = display_pre_registration_summary($data);
	$_POST = sql_escape_strings($_POST);
	save_pre_registration($_POST, $lessons_str);
	break;
default:
	require 'views/form_add_pre_registration.html.php';
	break;
}

require 'views/footer_pre_registration.html.php';
?>

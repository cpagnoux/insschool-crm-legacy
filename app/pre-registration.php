<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'src/pre-registration.php';

$action = '';

if (isset($_POST['submit']))
	$action = 'submit';

require 'views/header_pre_registration.html.php';

switch ($action) {
case 'submit':
	$lessons_str = display_pre_registration_summary($_POST);
	save_pre_registration($_POST, $lessons_str);
	break;
default:
	require 'views/form_add_pre_registration.html.php';
	break;
}

require 'views/footer.html.php';
?>

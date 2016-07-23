<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/libpre-registration.php';

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

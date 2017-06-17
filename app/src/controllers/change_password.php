<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

$action = '';

if (isset($_GET['status']))
	$action = 'status';
else if (isset($_POST['submit']))
	$action = 'submit';

switch ($action) {
case 'submit':
	change_password($_POST['current_password'], $_POST['new_password'],
			$_POST['new_password_confirm']);
	break;
case 'status':
	require 'app/views/header.html.php';
	require 'app/views/status_change_password.html.php';
	require 'app/views/footer.html.php';
	break;
default:
	require 'app/views/header.html.php';
	require 'app/views/form_change_password.html.php';
	require 'app/views/footer.html.php';
	break;
}

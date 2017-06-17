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
	send_mail($_GET['to']);
	break;
case 'status':
	status_send_mail($_GET['to']);
	break;
default:
	form_send_mail($_GET['to']);
	break;
}

<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'app/src/mail.php';

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

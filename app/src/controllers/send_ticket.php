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
	send_ticket($_POST['topic'], $_POST['message']);
	break;
case 'status':
	require 'app/views/header.html.php';
	require 'app/views/status_send_ticket.html.php';
	require 'app/views/footer.html.php';
	break;
default:
	require 'app/views/header.html.php';
	require 'app/views/form_send_ticket.html.php';
	require 'app/views/footer.html.php';
	break;
}

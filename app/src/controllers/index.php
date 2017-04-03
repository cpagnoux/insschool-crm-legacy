<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

require_once 'app/src/login.php';

$action = '';

if (isset($_GET['action']))
	$action = $_GET['action'];

switch ($action) {
case 'logout':
	logout();
	break;
default:
	require 'app/views/header.html.php';
	require 'app/views/home.html.php';
	require 'app/views/footer.html.php';
	break;
}

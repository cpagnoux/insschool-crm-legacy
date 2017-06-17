<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

$action = '';

if (isset($_GET['document']))
	$action = $_GET['document'];

switch ($action) {
case 'bill':
	generate_bill($_GET['registration_id']);
	break;
case 'call_sheet':
	generate_call_sheet($_GET['lesson_id'], $_POST['season'],
			    $_POST['quarter']);
	break;
}

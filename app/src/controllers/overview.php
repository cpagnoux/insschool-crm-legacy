<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'app/src/table.php';

$action = '';

if (isset($_GET['action']))
	$action = $_GET['action'];

switch ($action) {
case 'reset_filters':
	reset_filters($_GET['table']);
	break;
default:
	display_table($_GET['table'], $_GET['page']);
	break;
}

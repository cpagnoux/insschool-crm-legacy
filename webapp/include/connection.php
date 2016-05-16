<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/error.php';

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '210713');
define('DATABASE', 'ins_school');

function connect_ins_school()
{
	$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if (mysqli_connect_errno()) {
		sql_connect_error();
		exit;
	}

	mysqli_set_charset($link, 'utf8');

	return $link;
}
?>

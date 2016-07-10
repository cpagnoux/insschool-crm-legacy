<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/config.php';
include_once 'include/error.php';

function connect_database()
{
	$link = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	if (!$link) {
		sql_connect_error();
		exit;
	}

	mysqli_set_charset($link, 'utf8');

	return $link;
}
?>

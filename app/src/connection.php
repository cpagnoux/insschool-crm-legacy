<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'config/app.config.php';

require_once 'src/error.php';

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

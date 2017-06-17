<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

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

/*
 * Security
 */
function sql_escape_strings($array)
{
	if (!isset($array))
		return;

	$link = connect_database();

	foreach($array as &$value) {
		$value = trim($value);
		$value = mysqli_real_escape_string($link, $value);
	}

	mysqli_close($link);

	return $array;
}

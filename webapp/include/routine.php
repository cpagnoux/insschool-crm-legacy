<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/connection.php';
include_once 'include/error.php';

function file_complete($file_id)
{
	$link = connect_ins_school();

	$query = 'SELECT file_complete ("' . $file_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function lesson_duration($lesson_id)
{
	$link = connect_ins_school();

	$query = 'SELECT lesson_duration ("' . $lesson_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function lesson_num_subscribers($lesson_id)
{
	$link = connect_ins_school();

	$query = 'SELECT lesson_num_subscribers ("' . $lesson_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function order_amount($order_id)
{
	$link = connect_ins_school();

	$query = 'SELECT order_amount ("' . $order_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function order_amount_goody($order_id, $goody_id)
{
	$link = connect_ins_school();

	$query = 'SELECT order_amount_goody ("' . $order_id . '", "' .
		 $goody_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function registration_amount($registration_id)
{
	$link = connect_ins_school();

	$query = 'SELECT registration_amount ("' . $registration_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function registration_paid($registration_id)
{
	$link = connect_ins_school();

	$query = 'SELECT registration_paid ("' . $registration_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function registration_total_paid($registration_id)
{
	$link = connect_ins_school();

	$query = 'SELECT registration_total_paid ("' . $registration_id . '")';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}
?>

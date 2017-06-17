<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

function init_session()
{
	session_start();

	if (isset($_POST['member_filter']))
		$_SESSION['member_filter'] = $_POST['member_filter'];
	if (isset($_POST['order_filter_by_member']))
		$_SESSION['order_filter_by_member'] =
				$_POST['order_filter_by_member'];
	if (isset($_POST['order_filter']))
		$_SESSION['order_filter'] = $_POST['order_filter'];
	if (isset($_POST['goody_sorting']))
		$_SESSION['goody_sorting'] = $_POST['goody_sorting'];
	if (isset($_POST['lesson_sorting']))
		$_SESSION['lesson_sorting'] = $_POST['lesson_sorting'];
	if (isset($_POST['order_sorting']))
		$_SESSION['order_sorting'] = $_POST['order_sorting'];
	if (isset($_POST['person_sorting']))
		$_SESSION['person_sorting'] = $_POST['person_sorting'];
	if (isset($_POST['room_sorting']))
		$_SESSION['room_sorting'] = $_POST['room_sorting'];

	if (isset($_POST['limit']))
		$_SESSION['limit'] = $_POST['limit'];
}

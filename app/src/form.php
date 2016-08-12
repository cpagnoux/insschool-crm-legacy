<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/pre-registration.php';

/*
 * Drop-down lists for forms
 */
function select_date($label, $prefix, $required, $date)
{
	$months = array(
		1 => 'Janvier',
		2 => 'Février',
		3 => 'Mars',
		4 => 'Avril',
		5 => 'Mai',
		6 => 'Juin',
		7 => 'Juillet',
		8 => 'Août',
		9 => 'Septembre',
		10 => 'Octobre',
		11 => 'Novembre',
		12 => 'Décembre'
	);

	$required_mark = '';
	$required_attribute = '';

	if ($required) {
		$required_mark = ' <sup>*</sup>';
		$required_attribute = ' required="required"';
	}

	if (isset($date))
		list($year, $month, $day) = sscanf($date, '%d-%d-%d');

	require 'views/select_date.html.php';
}

function select_day($day)
{
	$day_monday = '';
	$day_tuesday = '';
	$day_wednesday = '';
	$day_thursday = '';
	$day_friday = '';

	if (isset($day)) {
		switch ($day) {
		case 'MONDAY':
			$day_monday = ' selected="selected"';
			break;
		case 'TUESDAY':
			$day_tuesday = ' selected="selected"';
			break;
		case 'WEDNESDAY':
			$day_wednesday = ' selected="selected"';
			break;
		case 'THURSDAY':
			$day_thursday = ' selected="selected"';
			break;
		case 'FRIDAY':
			$day_friday = ' selected="selected"';
			break;
		}
	}

	require 'views/select_day.html.php';
}

function select_goody()
{
	$link = connect_database();

	$query = 'SELECT goody_id, name FROM goody ORDER BY name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_goody.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_lesson()
{
	$link = connect_database();

	$query = 'SELECT lesson_id, title FROM lesson ORDER BY title';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_lesson.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_member()
{
	$link = connect_database();

	$query = 'SELECT member_id, first_name, last_name FROM member ' .
		 'ORDER BY last_name, first_name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_member.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_mode($mode)
{
	$mode_cash = '';
	$mode_check = '';

	if (isset($mode)) {
		switch ($mode) {
		case 'CASH':
			$mode_cash = ' selected="selected"';
			break;
		case 'CHECK':
			$mode_check = ' selected="selected"';
			break;
		}
	}

	require 'views/select_mode.html.php';
}

function select_room($room_id)
{
	$link = connect_database();

	$query = 'SELECT room_id, name FROM room ORDER BY room_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_room.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_teacher($teacher_id)
{
	$link = connect_database();

	$query = 'SELECT teacher_id, first_name, last_name FROM teacher ' .
		 'ORDER BY last_name, first_name';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	require 'views/select_teacher.html.php';

	mysqli_free_result($result);
	mysqli_close($link);
}

function select_time($label, $prefix, $time)
{
	if (isset($time))
		list($hour, $minute) = sscanf($time, '%d:%d');

	require 'views/select_time.html.php';
}

/*
 * Forms' content
 */
function form_content_member($row)
{
	$mok_poster_flyer = '';
	$mok_internet = '';
	$mok_word_of_mouth = '';
	$volunteer_true = '';
	$volunteer_false = '';

	if (isset($row)) {
		switch ($row['means_of_knowledge']) {
		case 'POSTER_FLYER':
			$mok_poster_flyer = ' checked="checked"';
			break;
		case 'INTERNET':
			$mok_internet = ' checked="checked"';
			break;
		case 'WORD_OF_MOUTH':
			$mok_word_of_mouth =
					' checked="checked"';
			break;
		}

		if ($row['volunteer'])
			$volunteer_true = ' checked="checked"';
		else
			$volunteer_false = ' checked="checked"';
	}

	require 'views/form_content_member.html.php';
}

function form_content_pre_registration($row)
{
	$lessons = array();
	$p_quarterly = '';
	$p_annual = '';
	$mok_poster_flyer = '';
	$mok_internet = '';
	$mok_word_of_mouth = '';

	if (isset($row)) {
		$lessons = string_to_lessons($row['lessons']);

		switch ($row['plan']) {
		case 'QUARTERLY':
			$p_quarterly = ' checked="checked"';
			break;
		case 'ANNUAL':
			$p_annual = ' checked="checked"';
			break;
		}

		switch ($row['means_of_knowledge']) {
		case 'POSTER_FLYER':
			$mok_poster_flyer = ' checked="checked"';
			break;
		case 'INTERNET':
			$mok_internet = ' checked="checked"';
			break;
		case 'WORD_OF_MOUTH':
			$mok_word_of_mouth =
					' checked="checked"';
			break;
		}
	}

	require 'views/form_content_pre_registration.html.php';
}

function form_content_registration($member_id, $row)
{
	$p_quarterly = '';
	$p_annual = '';

	if (isset($row)) {
		switch ($row['plan']) {
		case 'QUARTERLY':
			$p_quarterly = ' checked="checked"';
			break;
		case 'ANNUAL':
			$p_annual = ' checked="checked"';
			break;
		}
	}

	require 'views/form_content_registration.html.php';
}

function form_content_registration_file($registration_id, $row)
{
	$medical_certificate_true = '';
	$medical_certificate_false = '';
	$insurance_true = '';
	$insurance_false = '';
	$photo_true = '';
	$photo_false = '';

	if (isset($row)) {
		if ($row['medical_certificate'])
			$medical_certificate_true = ' checked="checked"';
		else
			$medical_certificate_false = ' checked="checked"';

		if ($row['insurance'])
			$insurance_true = ' checked="checked"';
		else
			$insurance_false = ' checked="checked"';

		if ($row['photo'])
			$photo_true = ' checked="checked"';
		else
			$photo_false = ' checked="checked"';
	}

	require 'views/form_content_registration_file.html.php';
}
?>

<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/pre-registration.php';

/*
 * Checkboxes for forms
 */
function checkbox_lessons($lessons_str = null)
{
	$lessons = array();

	if (isset($lessons_str))
		$lessons = string_to_lessons($lessons_str);

	display_lessons($lessons);
}

/*
 * Radio buttons for forms
 */
function radio_insurance($insurance = null)
{
	$true = '';
	$false = '';

	if (isset($insurance)) {
		if ($insurance)
			$true = ' checked="checked"';
		else
			$false = ' checked="checked"';
	}

	require 'views/radio_insurance.html.php';
}

function radio_means_of_knowledge($pre_registration_form, $means_of_knowledge = null)
{
	$poster_flyer = '';
	$internet = '';
	$word_of_mouth = '';

	if (isset($means_of_knowledge)) {
		switch ($means_of_knowledge) {
		case 'POSTER_FLYER':
			$poster_flyer = ' checked="checked"';
			break;
		case 'INTERNET':
			$internet = ' checked="checked"';
			break;
		case 'WORD_OF_MOUTH':
			$word_of_mouth = ' checked="checked"';
			break;
		}
	}

	require 'views/radio_means_of_knowledge.html.php';
}

function radio_medical_certificate($medical_certificate = null)
{
	$true = '';
	$false = '';

	if (isset($medical_certificate)) {
		if ($medical_certificate)
			$true = ' checked="checked"';
		else
			$false = ' checked="checked"';
	}

	require 'views/radio_medical_certificate.html.php';
}

function radio_mode($mode = null)
{
	$cash = '';
	$check = '';

	if (isset($mode)) {
		switch ($mode) {
		case 'CASH':
			$cash = ' checked="checked"';
			break;
		case 'CHECK':
			$check = ' checked="checked"';
			break;
		}
	}

	require 'views/radio_mode.html.php';
}

function radio_photo($photo = null)
{
	$true = '';
	$false = '';

	if (isset($photo)) {
		if ($photo)
			$true = ' checked="checked"';
		else
			$false = ' checked="checked"';
	}

	require 'views/radio_photo.html.php';
}

function radio_plan($plan = null)
{
	$quarterly = '';
	$annual = '';

	if (isset($plan)) {
		switch ($plan) {
		case 'QUARTERLY':
			$quarterly = ' checked="checked"';
			break;
		case 'ANNUAL':
			$annual = ' checked="checked"';
			break;
		}
	}

	require 'views/radio_plan.html.php';
}

/*
 * Drop-down lists for forms
 */
function select_date($label, $prefix, $required, $date = null)
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

function select_day($day = null)
{
	$monday = '';
	$tuesday = '';
	$wednesday = '';
	$thursday = '';
	$friday = '';

	if (isset($day)) {
		switch ($day) {
		case 'MONDAY':
			$monday = ' selected="selected"';
			break;
		case 'TUESDAY':
			$tuesday = ' selected="selected"';
			break;
		case 'WEDNESDAY':
			$wednesday = ' selected="selected"';
			break;
		case 'THURSDAY':
			$thursday = ' selected="selected"';
			break;
		case 'FRIDAY':
			$friday = ' selected="selected"';
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

function select_time($label, $prefix, $time = null)
{
	if (isset($time))
		list($hour, $minute) = sscanf($time, '%d:%d');

	require 'views/select_time.html.php';
}
?>

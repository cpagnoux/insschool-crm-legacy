<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'config/app.config.php';

require_once 'src/connection.php';
require_once 'src/error.php';
require_once 'src/util.php';

require_once 'src/table.php';

function form_send_mail($to)
{
	require 'views/header.html.php';

	switch ($to) {
	case 'single_recipient':
		send_mail_to_single_recipient($_GET['table'], $_GET['id'], '',
					      '', true);
		require 'views/form_send_mail.html.php';
		break;
	case 'multiple_recipients':
		require 'views/form_send_mail_to_multiple_recipients.html.php';
		break;
	case 'lesson_registrants':
		require 'views/form_send_mail_to_lesson_registrants.html.php';
		break;
	}

	require 'views/footer.html.php';
}

function send_mail_to_single_recipient($table, $id, $subject, $message,
				       $no_sending = false)
{
	$link = connect_database();

	$query = 'SELECT email FROM `' . $table . '` WHERE ' . $table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	if ($no_sending) {
		if ($row['email'] == '')
			redirect_after_send_mail($table, $id,
						 'undefined_email');

		return;
	}

	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ' . EMAIL;

	$success = mail($row['email'], $subject, $message, $headers);

	$status = 'failure';

	if ($success)
		$status = 'success';

	redirect_after_send_mail($table, $id, $status);
}

function send_mail_to_multiple_recipients($table, $subject, $message)
{
	$filter = select_filter($table);

	$link = connect_database();

	$query = 'SELECT email FROM `' . $table . '`' . $filter;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$to = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['email'] != '' && $to == '')
			$to = $row['email'];
		else if ($row['email'] != '')
			$to .= ', ' . $row['email'];
	}

	mysqli_free_result($result);
	mysqli_close($link);

	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ' . EMAIL;

	$success = mail($to, $subject, $message, $headers);

	$status = 'failure';

	if ($success)
		$status = 'success';

	redirect_after_send_mail_to_multiple_recipients($table, $status);
}

function send_mail_to_lesson_registrants($lesson_id, $season, $subject,
					 $message)
{
	$link = connect_database();

	$query = 'SELECT member.email FROM member INNER JOIN registration ' .
		 'ON registration.member_id = member.member_id ' .
		 'INNER JOIN registration_detail ' .
		 'ON registration_detail.registration_id = ' .
		 'registration.registration_id ' .
		 'WHERE registration_detail.lesson_id = ' . $lesson_id .
		 ' AND registration.season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$to = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['email'] != '' && $to == '')
			$to = $row['email'];
		else if ($row['email'] != '')
			$to .= ', ' . $row['email'];
	}

	mysqli_free_result($result);
	mysqli_close($link);

	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ' . EMAIL;

	$success = mail($to, $subject, $message, $headers);

	$status = 'failure';

	if ($success)
		$status = 'success';

	redirect_after_send_mail_to_lesson_registrants($lesson_id, $status);
}

function send_mail($to)
{
	switch ($to) {
	case 'single_recipient':
		send_mail_to_single_recipient($_POST['table'], $_POST['id'],
				$_POST['subject'], $_POST['message']);
		break;
	case 'multiple_recipients':
		send_mail_to_multiple_recipients($_POST['table'],
				$_POST['subject'], $_POST['message']);
		break;
	case 'lesson_registrants':
		send_mail_to_lesson_registrants($_POST['lesson_id'],
				$_POST['season'], $_POST['subject'],
				$_POST['message']);
		break;
	}
}

function status_send_mail($to)
{
	require 'views/header.html.php';

	switch ($to) {
	case 'single_recipient':
		require 'views/status_send_mail.html.php';
		break;
	case 'multiple_recipients':
		require 'views/' .
			'status_send_mail_to_multiple_recipients.html.php';
		break;
	case 'lesson_registrants':
		require 'views/status_send_mail_to_lesson_registrants.html.php';
		break;
	}

	require 'views/footer.html.php';
}

function send_ticket($topic, $message)
{
	$subject = '';

	switch ($topic) {
	case 1:
		$subject = '[Assistance] Rapport de bug';
		break;
	case 2:
		$subject = '[Assistance] Retour';
		break;
	}

	$message = wordwrap($message, 70, "\r\n");

	$headers = 'From: ' . EMAIL;

	$success = mail(DEV_EMAIL, $subject, $message, $headers);

	$status = 'failure';

	if ($success)
		$status = 'success';

	redirect_after_send_ticket($status);
}
?>

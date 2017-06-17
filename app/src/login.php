<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

function verify_login($username, $password)
{
	$link = connect_database();

	$query = 'SELECT * FROM user WHERE username = "' . $username .
		 '" AND password = "' . hash('sha512', $password) . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$valid = false;

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);

		$_SESSION['username'] = $username;
		$_SESSION['admin'] = $row['admin'];

		$valid = true;
	}

	mysqli_free_result($result);
	mysqli_close($link);

	return $valid;
}

function verify_session()
{
	$link = connect_database();

	$query = 'SELECT * FROM user WHERE username = "' .
		 $_SESSION['username'] . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$valid = false;

	if (mysqli_num_rows($result) == 1)
		$valid = true;

	mysqli_free_result($result);
	mysqli_close($link);

	return $valid;
}

function session_valid()
{
	unset($_SESSION['login-failure']);

	if (isset($_POST['username']) && isset($_POST['password'])) {
		if (verify_login($_POST['username'], $_POST['password']))
			redirect_home();
		else
			$_SESSION['login-failure'] = true;
	}

	if (isset($_SESSION['username']))
		return verify_session();

	return false;
}

function verify_password($password)
{
	$link = connect_database();

	$query = 'SELECT * FROM user WHERE username = "' .
		 $_SESSION['username'] . '" AND password = "' .
		 hash('sha512', $password) . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$valid = false;

	if (mysqli_num_rows($result) == 1)
		$valid = true;

	mysqli_free_result($result);
	mysqli_close($link);

	return $valid;
}

function change_password($current_password, $new_password,
			 $new_password_confirm)
{
	if (!verify_password($current_password)) {
		$_SESSION['wrong_password'] = true;
		require 'app/views/header.html.php';
		require 'app/views/form_change_password.html.php';
		require 'app/views/footer.html.php';
		unset($_SESSION['wrong_password']);
		return;
	}

	if ($new_password != $new_password_confirm) {
		$_SESSION['passwords_differ'] = true;
		require 'app/views/header.html.php';
		require 'app/views/form_change_password.html.php';
		require 'app/views/footer.html.php';
		unset($_SESSION['passwords_differ']);
		return;
	}

	$link = connect_database();

	$query = 'UPDATE user SET password = "' .
		 hash('sha512', $new_password) . '" WHERE username = "' .
		 $_SESSION['username'] . '"';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	redirect_after_change_password();
}

function logout()
{
	unset($_SESSION['username']);
	unset($_SESSION['admin']);

	redirect_home();
}

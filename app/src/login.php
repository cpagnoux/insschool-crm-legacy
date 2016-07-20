<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/connection.php';
require_once 'src/error.php';

function login()
{
	echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">' .
	     PHP_EOL;

	echo '  Nom d\'utilisateur<br>' . PHP_EOL;
	echo '  <input type="text" name="username" required="required"><br>' .
	     PHP_EOL;
	echo '  Mot de passe<br>' . PHP_EOL;
	echo '  <input type="password" name="password" required="required">' .
	     '<br>' . PHP_EOL;

	echo '  <br>' . PHP_EOL;
	echo '  <input type="submit" name="submit" value="Se connecter"><br>' .
	     PHP_EOL;

	echo '</form>' . PHP_EOL;
}

function verify_login($username, $password)
{
	$link = connect_database();

	$query = 'SELECT * FROM user WHERE username = "' . $username .
		 '" AND password = "' . $password . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	if (mysqli_num_rows($result) == 1)
		$_SESSION['username'] = $username;

	mysqli_free_result($result);
	mysqli_close($link);
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
	if (isset($_POST['username']) && isset($_POST['password']))
		verify_login($_POST['username'], $_POST['password']);

	if (isset($_SESSION['username']))
		return verify_session();
}

function logout()
{
	unset($_SESSION['username']);
	header('Location: ' . $_SERVER['PHP_SELF']);
}
?>
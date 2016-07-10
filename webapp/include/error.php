<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/config.php';

function sql_connect_error()
{
	if (DEBUG == 1)
		echo 'Echec de la connexion : ' . mysqli_connect_error() .
		     '<br>' . PHP_EOL;
	else
		echo 'Une erreur est survenue !<br>' . PHP_EOL;
}

function sql_error($link, $query)
{
	if (DEBUG == 1) {
		echo 'Erreur SQL : ' . mysqli_error($link) . '<br>' . PHP_EOL;
		echo $query . '<br>' . PHP_EOL;
	} else {
		echo 'Une erreur est survenue !<br>' . PHP_EOL;
	}
}
?>

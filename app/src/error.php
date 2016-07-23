<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'config/app.config.php';

function sql_connect_error()
{
	if (DEBUG == 1)
		echo '<p>Echec de la connexion : ' . mysqli_connect_error() .
		     '</p>' . PHP_EOL;
	else
		echo '<p>Une erreur est survenue !</p>' . PHP_EOL;
}

function sql_error($link, $query)
{
	if (DEBUG == 1) {
		echo '<p>Erreur SQL : ' . mysqli_error($link) . '<br>' .
		     PHP_EOL;
		echo $query . '</p>' . PHP_EOL;
	} else {
		echo '<p>Une erreur est survenue !</p>' . PHP_EOL;
	}
}
?>

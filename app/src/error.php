<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

function sql_connect_error()
{
	if (DEBUG == 1)
		echo '<p><b>Echec de la connexion :</b> ' .
		     mysqli_connect_error() . '</p>' . PHP_EOL;
	else
		echo '<p>Une erreur est survenue !</p>' . PHP_EOL;
}

function sql_error($link, $query)
{
	if (DEBUG == 1) {
		echo '<p><b>Erreur SQL :</b> ' . mysqli_error($link) . '<br>' .
		     PHP_EOL;
		echo $query . '</p>' . PHP_EOL;
	} else {
		echo '<p>Une erreur est survenue !</p>' . PHP_EOL;
	}
}

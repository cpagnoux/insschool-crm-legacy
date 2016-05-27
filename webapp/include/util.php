<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

function evaluate_boolean($value)
{
	if ($value)
		return 'oui';
	else
		return 'non';
}

/*
 * Hyperlinks
 */
function link_table_previous($table, $page)
{
	if ($page == 1)
		return '<a href="back-office.php?table=' . $table .
		       '">Précédent</a>';

	return '<a href="back-office.php?table=' . $table . '&amp;page=' .
	       $page . '">Précédent</a>';
}

function link_table_next($table, $page)
{
	return '<a href="back-office.php?table=' . $table . '&amp;page=' .
	       $page . '">Suivant</a>';
}

function link_entity($table, $id)
{
	return '<a href="back-office.php?table=' . $table . '&amp;id=' . $id .
	       '">+ d\'infos</a>';
}

function link_add_entity($table)
{
	return '<a href="back-office.php?mode=add&amp;table=' . $table .
	       '">Ajouter</a>';
}

function link_add_entity_by_id($table, $id)
{
	$message = 'Ajouter';

	switch ($table) {
	case 'contains':
		$message = 'Ajouter un article';
		break;
	case 'file':
		$message = 'En créer un';
		break;
	case 'payment':
		$message = 'Ajouter un paiement';
		break;
	case 'registration':
		$message = 'Ajouter une inscription';
		break;
	}

	return '<a href="back-office.php?mode=add&amp;table=' . $table .
	       '&amp;id=' . $id . '">' . $message . '</a>';
}

function link_modify_entity($table, $id)
{
	return '<a href="back-office.php?mode=modify&amp;table=' . $table .
	       '&amp;id=' . $id . '">Modifier</a>';
}

function link_delete_entity($table, $id)
{
	return '<a href="back-office.php?mode=delete&amp;table=' . $table .
	       '&amp;id=' . $id . '" onclick="return confirm(' .
	       '\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

/*
 * Database-related functions
 */
function row_count($table)
{
	$link = connect_ins_school();

	$query = 'SELECT COUNT(*) FROM `' . $table . '`';
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

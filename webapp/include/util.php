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
function link_entity($table, $id)
{
	return '<a href="back-office.php?table=' . $table . '&amp;id=' . $id .
	       '">+ d\'infos</a>';
}

function link_add_entity($table)
{
	return '<a href="back-office.php?table=' . $table .
	       '&amp;mode=add">Ajouter</a>';
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

	return '<a href="back-office.php?table=' . $table .
	       '&amp;mode=add&amp;id=' . $id . '">' . $message . '</a>';
}

function link_modify_entity($table, $id)
{
	return '<a href="back-office.php?table=' . $table . '&amp;id=' . $id .
	       '&amp;mode=modify">Modifier</a>';
}
?>

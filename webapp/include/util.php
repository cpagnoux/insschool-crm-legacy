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

function product_status($value)
{
	if ($value > 0)
		return 'En stock';
	else
		return 'Produit épuisé';
}

/*
 * Hyperlinks
 */
function link_table_previous($table, $page)
{
	if ($page == 1)
		return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		       '">Précédent</a>';

	return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	       '&amp;page=' . $page . '">Précédent</a>';
}

function link_table_next($table, $page)
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	       '&amp;page=' . $page . '">Suivant</a>';
}

function link_entity($table, $id)
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	       '&amp;id=' . $id . '">+ d\'infos</a>';
}

function link_add_entity($table)
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '?mode=add&amp;table=' .
	       $table . '">Ajouter</a>';
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

	return '<a href="' . $_SERVER['PHP_SELF'] . '?mode=add&amp;table=' .
	       $table . '&amp;id=' . $id . '">' . $message . '</a>';
}

function link_modify_entity($table, $id)
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '?mode=modify&amp;table=' .
	       $table . '&amp;id=' . $id . '">Modifier</a>';
}

function link_delete_entity($table, $id)
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '?mode=delete&amp;table=' .
	       $table . '&amp;id=' . $id . '" onclick="return ' .
	       'confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

/*
 * Database-related functions
 */
function file_complete($file_id)
{
	$link = connect_ins_school();

	$query = 'SELECT * FROM file WHERE file_id = ' . $file_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	if ($row['medical_certificate'] && $row['insurance'] && $row['photo'])
		return true;
	else
		return false;
}

function get_name($table, $id)
{
	$link = connect_ins_school();

	$query = 'SELECT first_name, last_name FROM `' . $table . '` WHERE ' .
		 $table . '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['first_name'] . ' ' . $row['last_name'];
}

function get_room_name($room_id)
{
	$link = connect_ins_school();

	$query = 'SELECT name FROM room WHERE room_id = ' . $room_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['name'];
}

// FIXME: compute complete time (HH:MM:SS)
/*function lesson_duration($lesson_id)
{
	$link = connect_ins_school();

	$query = 'SELECT start_time, end_time FROM lesson WHERE lesson_id = ' .
		 $lesson_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['end_time'] - $row['start_time'];
}*/

function lesson_subscriber_count($lesson_id)
{
	$link = connect_ins_school();

	$query = 'SELECT COUNT(*) FROM participates WHERE lesson_id = ' .
		 $lesson_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function order_amount($order_id)
{
	$link = connect_ins_school();

	$query = 'SELECT contains.quantity, goody.price FROM contains ' .
		 'INNER JOIN goody ON contains.goody_id = goody.goody_id ' .
		 'WHERE contains.order_id = ' . $order_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$amount = 0;

	while ($row = mysqli_fetch_assoc($result))
		$amount = $amount + $row['quantity'] * $row['price'];

	mysqli_free_result($result);
	mysqli_close($link);

	return $amount;
}

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

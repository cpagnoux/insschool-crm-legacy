<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

function duration($start_time, $end_time)
{
	// time is under the format HH:MM:SS
	sscanf($start_time, '%d', $start_hour);
	$start_time = substr($start_time, strlen($start_hour) + 1);
	sscanf($start_time, '%d', $start_min);
	$start_time = substr($start_time, strlen($start_min) + 1);
	sscanf($start_time, '%d', $start_sec);

	sscanf($end_time, '%d', $end_hour);
	$end_time = substr($end_time, strlen($end_hour) + 1);
	sscanf($end_time, '%d', $end_min);
	$end_time = substr($end_time, strlen($end_min) + 1);
	sscanf($end_time, '%d', $end_sec);

	$min_restraint = 0;
	$hour_restraint = 0;

	$sec = $end_sec - $start_sec;
	if ($sec < 0) {
		$min_restraint = 1;
		$sec += 60;
	}

	$min = $end_min - $start_min - $min_restraint;
	if ($min < 0) {
		$hour_restraint = 1;
		$min += 60;
	}

	$hour = $end_hour - $start_hour - $hour_restraint;
	if ($hour < 0)
		return 'durée invalide';

	$duration = $hour . ':' . $min . ':' . $sec;

	return $duration;
}

function evaluate_boolean($value)
{
	if ($value)
		return 'oui';
	else
		return 'non';
}

function price_after_discount($price, $discount)
{
	// $discount is a percentage
	return $price * (1 - $discount / 100);
}

function product_status($stock)
{
	if ($stock > 0)
		return 'En stock';
	else
		return 'Produit épuisé';
}

function total_by_product($price, $quantity)
{
	return $price * $quantity;
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

function order_total($order_id)
{
	$link = connect_ins_school();

	$query = 'SELECT contains.quantity, goody.price FROM contains ' .
		 'INNER JOIN goody ON contains.goody_id = goody.goody_id ' .
		 'WHERE contains.order_id = ' . $order_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$total = 0;

	while ($row = mysqli_fetch_assoc($result))
		$total += $row['price'] * $row['quantity'];

	mysqli_free_result($result);
	mysqli_close($link);

	return $total;
}

function registration_paid($registration_id)
{
	if (registration_total_paid($registration_id) ==
	    registration_price($registration_id))
		return true;
	else
		return false;
}

function registration_price($registration_id)
{
	$link = connect_ins_school();

	$query = 'SELECT price, discount FROM registration ' .
		 'WHERE registration_id = ' . $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return price_after_discount($row['price'], $row['discount']);
}

function registration_total_paid($registration_id)
{
	$link = connect_ins_school();

	$query = 'SELECT amount FROM payment WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$total_paid = 0;

	while ($row = mysqli_fetch_assoc($result))
		$total_paid += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return $total_paid;
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

<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/connection.php';
include_once 'include/error.php';

/*
 * Navigation bar
 */
function navigation_bar()
{
	echo '<hr>' . PHP_EOL;
	echo '<nav>' . PHP_EOL;
	echo '  ' . link_home() . PHP_EOL;
	echo '  ' . link_table('lesson') . PHP_EOL;
	echo '  ' . link_table('teacher') . PHP_EOL;
	echo '  ' . link_table('room') . PHP_EOL;
	echo '  ' . link_table('goody') . PHP_EOL;
	echo '  ' . link_table('order') . PHP_EOL;
	echo '  ' . link_table('member') . PHP_EOL;
	echo '  ' . link_table('pre_registration') . PHP_EOL;
	echo '</nav>' . PHP_EOL;
	echo '<hr>' . PHP_EOL;
}

/*
 * Hyperlinks
 */
function link_home()
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '">Accueil</a>';
}

function link_table($table)
{
	switch ($table) {
	case 'goody':
		$message = 'Goodies';
		break;
	case 'lesson':
		$message = 'Cours';
		break;
	case 'member':
		$message = 'Adhérents';
		break;
	case 'order':
		$message = 'Commandes';
		break;
	case 'pre_registration':
		$message = 'Pré-inscriptions';
		break;
	case 'room':
		$message = 'Salles';
		break;
	case 'teacher':
		$message = 'Professeurs';
		break;
	default:
		$message = '';
		break;
	}

	return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table . '">' .
	       $message . '</a>';
}

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

function link_entity($table, $id, $message)
{
	if (isset($message))
		return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		       '&amp;id=' . $id . '">' . $message . '</a>';

	return '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	       '&amp;id=' . $id . '">+ d\'infos</a>';
}

function link_add_entity($table, $id)
{
	if (!isset($id))
		return '<a href="' . $_SERVER['PHP_SELF'] .
		       '?mode=add&amp;table=' . $table . '">Ajouter</a>';

	switch ($table) {
	case 'file':
		$message = 'En créer un';
		break;
	case 'order_content':
		$message = 'Ajouter un article';
		break;
	case 'order_payment':
		$message = 'Ajouter un paiement';
		break;
	case 'registration':
		$message = 'Ajouter une inscription';
		break;
	case 'registration_payment':
		$message = 'Ajouter un paiement';
		break;
	default:
		$message = 'Ajouter';
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

function link_commit_pre_registration($pre_registration_id)
{
	return '<a href="' . $_SERVER['PHP_SELF'] . '?mode=commit&amp;id=' .
	       $pre_registration_id . '">Valider la pré-inscription</a>';
}

function link_quantity_minus($order_id, $goody_id, $quantity)
{
	return '<a href="' . $_SERVER['PHP_SELF'] .
	       '?mode=modify_quantity&amp;order_id=' . $order_id .
	       '&amp;goody_id=' . $goody_id . '&amp;quantity=' . $quantity .
	       '">-</a>';
}

function link_quantity_plus($order_id, $goody_id, $quantity)
{
	return '<a href="' . $_SERVER['PHP_SELF'] .
	       '?mode=modify_quantity&amp;order_id=' . $order_id .
	       '&amp;goody_id=' . $goody_id . '&amp;quantity=' . $quantity .
	       '">+</a>';
}

function link_remove_product($order_id, $goody_id)
{
	return '<a href="' . $_SERVER['PHP_SELF'] .
	       '?mode=modify_quantity&amp;order_id=' . $order_id .
	       '&amp;goody_id=' . $goody_id . '&amp;quantity=0">Supprimer</a>';
}

function link_empty_cart($order_id)
{
	return '<a href="' . $_SERVER['PHP_SELF'] .
	       '?mode=empty_cart&amp;order_id=' . $order_id .
	       '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	       'Vider le panier</a>';
}

/*
 * Miscellaneous functions
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

	$duration = sprintf('%02d', $hour) . ':' . sprintf('%02d', $min) . ':' .
		    sprintf('%02d', $sec);

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
	$new_price = $price * (1 - $discount / 100);

	return sprintf('%.2f', $new_price);
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
	$total = $price * $quantity;

	return sprintf('%.2f', $total);
}

/*
 * Database-related functions
 */
function file_complete($file_id)
{
	$link = connect_database();

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

function get_lesson_title($lesson_id)
{
	$link = connect_database();

	$query = 'SELECT title FROM lesson WHERE lesson_id = ' . $lesson_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['title'];
}

function get_member_id($registration_id)
{
	$link = connect_database();

	$query = 'SELECT member_id FROM registration WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['member_id'];
}

function get_name($table, $id)
{
	$link = connect_database();

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

function get_order_id($order_payment_id)
{
	$link = connect_database();

	$query = 'SELECT order_id FROM order_payment ' .
		 'WHERE order_payment_id = ' . $order_payment_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['order_id'];
}

function get_registration_id($registration_payment_id)
{
	$link = connect_database();

	$query = 'SELECT registration_id FROM registration_payment ' .
		 'WHERE registration_payment_id = ' . $registration_payment_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['registration_id'];
}

function get_room_name($room_id)
{
	$link = connect_database();

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
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM lesson_participation ' .
		 'WHERE lesson_id = ' . $lesson_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
}

function order_paid($order_id)
{
	if (total_paid('order', $order_id) == order_total($order_id))
		return true;
	else
		return false;
}

function order_total($order_id)
{
	$link = connect_database();

	$query = 'SELECT order_content.quantity, goody.price ' .
		 'FROM order_content INNER JOIN goody ' .
		 'ON order_content.goody_id = goody.goody_id ' .
		 'WHERE order_content.order_id = ' . $order_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$total = 0;

	while ($row = mysqli_fetch_assoc($result))
		$total += $row['price'] * $row['quantity'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $total);
}

function registration_paid($registration_id)
{
	if (total_paid('registration', $registration_id) ==
	    registration_price($registration_id))
		return true;
	else
		return false;
}

function registration_price($registration_id)
{
	$link = connect_database();

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

function row_count($table)
{
	$link = connect_database();

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

function total_paid($table, $id)
{
	$link = connect_database();

	$query = 'SELECT amount FROM ' . $table . '_payment WHERE ' . $table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$total_paid = 0;

	while ($row = mysqli_fetch_assoc($result))
		$total_paid += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $total_paid);
}
?>

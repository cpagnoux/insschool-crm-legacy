<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'src/connection.php';
require_once 'src/error.php';

/*
 * Hyperlinks
 */
function link_home()
{
	echo '<a href="' . $_SERVER['PHP_SELF'] . '">Accueil</a>';
}

function link_table($table)
{
	$message = '';

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
	}

	echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table . '">' .
	     $message . '</a>';
}

function link_table_previous($table, $page)
{
	if ($page == 1)
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '"><<</a>';
	else
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '&amp;page=' . $page . '"><<</a>';
}

function link_table_next($table, $page)
{
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	     '&amp;page=' . $page . '">>></a>';
}

function link_table_page($table, $page)
{
	if ($page == 1)
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '">' . $page . '</a>';
	else
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '&amp;page=' . $page . '">' . $page . '</a>';
}

function link_entity($table, $id, $message)
{
	if (isset($message))
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '&amp;id=' . $id . '">' . $message . '</a>';
	else
		echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
		     '?table=' . $table . '&amp;id=' . $id . '">+ d\'infos</a>';
}

function link_add_entity($table, $id)
{
	$message = '';

	switch ($table) {
	case 'goody':
		$message = 'Nouveau goodies';
		break;
	case 'lesson':
		$message = 'Nouveau cours';
		break;
	case 'member':
		$message = 'Nouvel adhérent';
		break;
	case 'order':
		$message = 'Nouvelle commande';
		break;
	case 'order_content':
		$message = 'Ajouter un article';
		break;
	case 'order_payment':
		$message = 'Nouveau paiement';
		break;
	case 'registration':
		$message = 'Nouvelle inscription';
		break;
	case 'registration_detail':
		$message = 'Ajouter un cours';
		break;
	case 'registration_payment':
		$message = 'Nouveau paiement';
		break;
	case 'room':
		$message = 'Nouvelle salle';
		break;
	case 'teacher':
		$message = 'Nouveau professeur';
		break;
	default:
		$message = 'Ajouter';
		break;
	}

	if (isset($id))
		echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
		     '?mode=add&amp;table=' . $table . '&amp;id=' . $id . '">' .
		     $message . '</a>';
	else
		echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
		     '?mode=add&amp;table=' . $table . '">' . $message . '</a>';
}

function link_modify_entity($table, $id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=' . $table . '&amp;id=' . $id .
	     '">Modifier</a>';
}

function link_delete_entity($table, $id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=delete&amp;table=' . $table . '&amp;id=' . $id .
	     '" onclick="return ' .
	     'confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_commit_pre_registration($pre_registration_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=commit&amp;id=' . $pre_registration_id .
	     '">Valider la pré-inscription</a>';
}

function link_quantity_minus($order_id, $goody_id, $quantity)
{
	echo '<a class="quantity-button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify_quantity&amp;order_id=' . $order_id .
	     '&amp;goody_id=' . $goody_id . '&amp;quantity=' . $quantity .
	     '">-</a>';
}

function link_quantity_plus($order_id, $goody_id, $quantity)
{
	echo '<a class="quantity-button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify_quantity&amp;order_id=' . $order_id .
	     '&amp;goody_id=' . $goody_id . '&amp;quantity=' . $quantity .
	     '">+</a>';
}

function link_remove_product($order_id, $goody_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify_quantity&amp;order_id=' . $order_id .
	     '&amp;goody_id=' . $goody_id . '&amp;quantity=0">Supprimer</a>';
}

function link_empty_cart($order_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=empty_cart&amp;order_id=' . $order_id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	     'Vider le panier</a>';
}

function link_toggle_show_participation($registration_id, $lesson_id)
{
	echo '<a class="toggle-button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=toggle_show_participation&amp;registration_id=' .
	     $registration_id . '&amp;lesson_id=' . $lesson_id .
	     '">Changer</a>';
}

function link_remove_lesson($registration_id, $lesson_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=remove_lesson&amp;registration_id=' . $registration_id .
	     '&amp;lesson_id=' . $lesson_id . '" onclick="return ' .
	     'confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_logout()
{
	echo '<a href="' . $_SERVER['PHP_SELF'] .
	     '?mode=logout">Se déconnecter</a>';
}

/*
 * Miscellaneous functions
 */
function current_season()
{
	if (date('m') >= 6)
		return date('Y') . '-' . (date('Y') + 1);

	return (date('Y') - 1) . '-' . date('Y');
}

function date_to_season($date)
{
	// date is in 'YYYY-MM-DD' format
	sscanf($date, '%d', $year);
	$date = substr($date, 5);
	sscanf($date, '%d', $month);

	if ($month >= 6)
		return $year . '-' . ($year + 1);

	return ($year - 1) . '-' . $year;
}

function duration($start_time, $end_time)
{
	// time is in 'HH:MM:SS' format
	sscanf($start_time, '%d', $start_hour);
	$start_time = substr($start_time, 3);
	sscanf($start_time, '%d', $start_minute);

	sscanf($end_time, '%d', $end_hour);
	$end_time = substr($end_time, 3);
	sscanf($end_time, '%d', $end_minute);

	$hour_restraint = 0;

	$minute = $end_minute - $start_minute;
	if ($minute < 0) {
		$hour_restraint = 1;
		$minute += 60;
	}

	$hour = $end_hour - $start_hour - $hour_restraint;
	if ($hour < 0)
		return 'durée invalide';

	return sprintf('%02d', $hour) . 'h' . sprintf('%02d', $minute);
}

function eval_enum($value)
{
	$result = '';

	switch ($value) {
	// day
	case 'MONDAY':
		$result = 'Lundi';
		break;
	case 'TUESDAY':
		$result = 'Mardi';
		break;
	case 'WEDNESDAY':
		$result = 'Mercredi';
		break;
	case 'THURSDAY':
		$result = 'Jeudi';
		break;
	case 'FRIDAY':
		$result = 'Vendredi';
		break;
	// means_of_knowledge
	case 'POSTER_FLYER':
		$result = 'Affiches, flyers';
		break;
	case 'INTERNET':
		$result = 'Internet';
		break;
	case 'WORD_OF_MOUTH':
		$result = 'Bouche-à-oreille';
		break;
	// mode
	case 'CASH':
		$result = 'Espèces';
		break;
	case 'CHECK':
		$result = 'Chèque';
		break;
	}

	return $result;
}

function eval_boolean($value)
{
	if ($value)
		return 'Oui';

	return 'Non';
}

function format_date($date)
{
	if ($date == '0000-00-00')
		return 'Inconnue';

	// date is in 'YYYY-MM-DD' format
	sscanf($date, '%d', $year);
	$date = substr($date, 5);
	sscanf($date, '%d', $month);
	$date = substr($date, 3);
	sscanf($date, '%d', $day);

	return sprintf('%02d', $day) . '/' . sprintf('%02d', $month) . '/' .
	       $year;
}

function format_time($time)
{
	// time is in 'HH:MM:SS' format
	sscanf($time, '%d', $hour);
	$time = substr($time, 3);
	sscanf($time, '%d', $minute);

	return sprintf('%02d', $hour) . 'h' . sprintf('%02d', $minute);
}

function previous_season()
{
	if (date('m') >= 6)
		return (date('Y') - 1) . '-' . date('Y');

	return (date('Y') - 2) . '-' . (date('Y') - 1);
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
function get_entity_name($table, $id)
{
	$link = connect_database();

	$query = 'SELECT name FROM `' . $table . '` WHERE ' . $table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['name'];
}

function get_goody_id_from_name($name)
{
	$link = connect_database();

	$query = 'SELECT goody_id FROM goody WHERE name = "' . $name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['goody_id'];
}

function get_lesson_id_from_title($title)
{
	$link = connect_database();

	$query = 'SELECT lesson_id FROM lesson WHERE title = "' . $title . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['lesson_id'];
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

function get_member_id_from_name($first_name, $last_name)
{
	$link = connect_database();

	$query = 'SELECT member_id FROM member WHERE first_name = "' .
		 $first_name . '" AND last_name = "' . $last_name . '"';
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

function get_order_content_quantity($order_id, $goody_id)
{
	$link = connect_database();

	$query = 'SELECT quantity FROM order_content WHERE order_id = ' .
		 $order_id . ' AND goody_id = ' . $goody_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['quantity'];
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

function get_order_id_from_info($member_id)
{
	$link = connect_database();

	$query = 'SELECT order_id FROM `order` WHERE member_id = ' .
		 $member_id . ' ORDER BY date DESC';
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

function get_registration_id_from_info($member_id, $season)
{
	$link = connect_database();

	$query = 'SELECT registration_id FROM registration WHERE member_id = ' .
		 $member_id . ' AND season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['registration_id'];
}

function get_registration_season($registration_id)
{
	$link = connect_database();

	$query = 'SELECT season FROM registration WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['season'];
}

function get_room_id_from_name($name)
{
	$link = connect_database();

	$query = 'SELECT room_id FROM room WHERE name = "' . $name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['room_id'];
}

function get_teacher_id_from_name($first_name, $last_name)
{
	$link = connect_database();

	$query = 'SELECT teacher_id FROM teacher WHERE first_name = "' .
		 $first_name . '" AND last_name = "' . $last_name . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row['teacher_id'];
}

function lesson_registrant_count($lesson_id, $season)
{
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM registration_detail ' .
		 'INNER JOIN registration ' .
		 'ON registration_detail.registration_id = ' .
		 'registration.registration_id ' .
		 'WHERE registration_detail.lesson_id = ' . $lesson_id .
		 ' AND registration.season = "' . $season . '"';
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

function registration_file_complete($registration_id)
{
	$link = connect_database();

	$query = 'SELECT * FROM registration_file WHERE registration_id = ' .
		 $registration_id;
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

function registration_formula($registration_id)
{
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM registration_detail ' .
		 'WHERE registration_id = ' . $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_row($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row[0];
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

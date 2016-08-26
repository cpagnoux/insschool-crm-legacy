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
	$label = '';

	switch ($table) {
	case 'goody':
		$label = 'Goodies';
		break;
	case 'lesson':
		$label = 'Cours';
		break;
	case 'member':
		$label = 'Adhérents';
		break;
	case 'order':
		$label = 'Commandes';
		break;
	case 'pre_registration':
		$label = 'Pré-inscriptions';
		break;
	case 'room':
		$label = 'Salles';
		break;
	case 'teacher':
		$label = 'Professeurs';
		break;
	case 'user':
		$label = 'Comptes utilisateurs';
		break;
	}

	echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table . '">' .
	     $label . '</a>';
}

function link_reset_filters($table)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=reset_filters&amp;table=' . $table .
	     '">Réinitialiser les filtres</a>';
}

function link_previous($table, $page)
{
	if ($page == 1)
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '">&lt;</a>';
	else
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '&amp;page=' . $page . '">&lt;</a>';
}

function link_next($table, $page)
{
	echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
	     '&amp;page=' . $page . '">&gt;</a>';
}

function link_page($table, $page)
{
	if ($page == 1)
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '">' . $page . '</a>';
	else
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '&amp;page=' . $page . '">' . $page . '</a>';
}

function link_entity($table, $id, $label = null)
{
	if (isset($label))
		echo '<a href="' . $_SERVER['PHP_SELF'] . '?table=' . $table .
		     '&amp;id=' . $id . '">' . $label . '</a>';
	else
		echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
		     '?table=' . $table . '&amp;id=' . $id . '">+ d\'infos</a>';
}

function link_add_entity($table, $id = null)
{
	$label = '';

	switch ($table) {
	case 'goody':
		$label = 'Nouveau goodies';
		break;
	case 'lesson':
		$label = 'Nouveau cours';
		break;
	case 'member':
		$label = 'Nouvel adhérent';
		break;
	case 'order':
		$label = 'Nouvelle commande';
		break;
	case 'order_content':
		$label = 'Ajouter un article';
		break;
	case 'order_payment':
		$label = 'Nouveau paiement';
		break;
	case 'registration':
		$label = 'Nouvelle inscription';
		break;
	case 'registration_detail':
		$label = 'Ajouter un cours';
		break;
	case 'registration_payment':
		$label = 'Nouveau paiement';
		break;
	case 'room':
		$label = 'Nouvelle salle';
		break;
	case 'teacher':
		$label = 'Nouveau professeur';
		break;
	default:
		$label = 'Ajouter';
		break;
	}

	if (isset($id))
		echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
		     '?mode=add&amp;table=' . $table . '&amp;id=' . $id . '">' .
		     $label . '</a>';
	else
		echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
		     '?mode=add&amp;table=' . $table . '">' . $label . '</a>';
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
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_toggle_volunteer($member_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=toggle_volunteer&amp;member_id=' . $member_id .
	     '">Changer</a>';
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

function link_commit_pre_registration($pre_registration_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=commit&amp;pre_registration_id=' . $pre_registration_id .
	     '">Valider la pré-inscription</a>';
}

function link_toggle_show_participation($registration_id, $lesson_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=toggle_show_participation&amp;registration_id=' .
	     $registration_id . '&amp;lesson_id=' . $lesson_id .
	     '">Changer</a>';
}

function link_remove_lesson($registration_id, $lesson_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=remove_lesson&amp;registration_id=' . $registration_id .
	     '&amp;lesson_id=' . $lesson_id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_update_absences($teacher_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=update_absences&amp;teacher_id=' . $teacher_id . '">+1</a>';
}

function link_reset_absences($teacher_id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=reset_absences&amp;teacher_id=' . $teacher_id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	     'Réinitialiser</a>';
}

function link_toggle_admin($username)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=toggle_admin&amp;username=' . $username . '">Changer</a>';
}

function link_reset_password($username)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=reset_password&amp;username=' . $username .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	     'Réinitialiser le mot de passe</a>';
}

function link_delete_user($username)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=delete_user&amp;username=' . $username .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_send_mail($table, $id)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=send_mail&amp;to=single_recipient&amp;table=' . $table .
	     '&amp;id=' . $id . '">Envoyer un mail</a>';
}

function link_send_mail_to_multiple_recipients($table)
{
	$label = '';

	switch ($table) {
	case 'member':
		switch ($_SESSION['member_filter']) {
		case 'all':
			$label = 'Envoyer un mail aux adhérents';
			break;
		case 'unpaid_registration':
			$label = 'Envoyer un mail aux adhérents n\'ayant pas ' .
				 'payé leur inscription';
			break;
		case 'volunteer':
			$label = 'Envoyer un mail aux bénévoles';
			break;
		}

		break;
	case 'teacher':
		$label = 'Envoyer un mail aux professeurs';
		break;
	default:
		$label = 'Envoyer un mail';
		break;
	}

	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=send_mail&amp;to=multiple_recipients&amp;table=' . $table .
	     '">' . $label . '</a>';
}

function link_send_mail_to_lesson_registrants($lesson_id, $season)
{
	echo '<a class="button" href="' . $_SERVER['PHP_SELF'] .
	     '?mode=send_mail&amp;to=lesson_registrants&amp;lesson_id=' .
	     $lesson_id . '&amp;season=' . $season .
	     '">Envoyer un mail aux inscrits</a>';
}

function link_send_ticket()
{
	echo '<a href="' . $_SERVER['PHP_SELF'] .
	     '?mode=send_ticket">Assistance</a>';
}

function link_change_password()
{
	echo '<a href="' . $_SERVER['PHP_SELF'] .
	     '?mode=change_password">Changer de mot de passe</a>';
}

function link_logout()
{
	echo '<a href="' . $_SERVER['PHP_SELF'] .
	     '?mode=logout">Se déconnecter</a>';
}

/*
 * Redirects
 */
function redirect_home()
{
	header('Location: ' . $_SERVER['PHP_SELF']);
}

function redirect($table, $id = null)
{
	if (isset($id))
		header('Location: ' . $_SERVER['PHP_SELF'] . '?table=' .
		       $table . '&id=' . $id);
	else
		header('Location: ' . $_SERVER['PHP_SELF'] . '?table=' .
		       $table);
}

function redirect_after_send_mail($table, $id, $status)
{
	header('Location: ' . $_SERVER['PHP_SELF'] .
	       '?mode=send_mail&to=single_recipient&table=' . $table . '&id=' .
	       $id . '&status=' . $status);
}

function redirect_after_send_mail_to_multiple_recipients($table, $status)
{
	header('Location: ' . $_SERVER['PHP_SELF'] .
	       '?mode=send_mail&to=multiple_recipients&table=' . $table .
	       '&status=' . $status);
}

function redirect_after_send_mail_to_lesson_registrants($lesson_id, $status)
{
	header('Location: ' . $_SERVER['PHP_SELF'] .
	       '?mode=send_mail&to=lesson_registrants&lesson_id=' . $lesson_id .
	       '&status=' . $status);
}

function redirect_after_send_ticket($status)
{
	header('Location: ' . $_SERVER['PHP_SELF'] .
	       '?mode=send_ticket&status=' . $status);
}

function redirect_after_change_password()
{
	header('Location: ' . $_SERVER['PHP_SELF'] .
	       '?mode=change_password&status=success');
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
	list($year, $month) = sscanf($date, '%d-%d');

	if ($month >= 6)
		return $year . '-' . ($year + 1);

	return ($year - 1) . '-' . $year;
}

function duration($start_time, $end_time)
{
	// time is in 'HH:MM:SS' format
	list($start_hour, $start_minute) = sscanf($start_time, '%d:%d');
	list($end_hour, $end_minute) = sscanf($end_time, '%d:%d');

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

function eval_boolean($value)
{
	if ($value)
		return 'Oui';

	return 'Non';
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
	// plan
	case 'QUARTERLY':
		$result = 'Trimestriel';
		break;
	case 'ANNUAL':
		$result = 'Annuel';
		break;
	}

	return $result;
}

function format_date($date)
{
	if ($date == '0000-00-00')
		return 'Inconnue';

	// date is in 'YYYY-MM-DD' format
	list($year, $month, $day) = sscanf($date, '%d-%d-%d');

	return sprintf('%02d', $day) . '/' . sprintf('%02d', $month) . '/' .
	       $year;
}

function format_phone_number($phone_number)
{
	if ($phone_number == '')
		return '';

	// user input is in '##########' format
	list($part1, $part2, $part3, $part4, $part5) = sscanf($phone_number,
			'%2c%2c%2c%2c%2c');

	return $part1 . ' ' . $part2 . ' ' . $part3 . ' ' . $part4 . ' ' .
	       $part5;
}

function format_time($time)
{
	// time is in 'HH:MM:SS' format
	list($hour, $minute) = sscanf($time, '%d:%d');

	return sprintf('%02d', $hour) . 'h' . sprintf('%02d', $minute);
}

function generate_password($length = 8)
{
	$chars = 'abcdefghijklmnopqrstuvwxyz' .
		 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' .
		 '0123456789';
	$num_chars = strlen($chars);

	$password = '';

	for ($i = 0; $i < $length; $i++) {
		$index = rand(0, $num_chars - 1);
		$password .= substr($chars, $index, 1);
	}

	return $password;
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

function to_date($day, $month, $year)
{
	return $year . '-' . $month . '-' . $day;
}

function to_time($hour, $minute)
{
	return $hour . ':' . $minute;
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
		 'ON registration.registration_id = ' .
		 'registration_detail.registration_id ' .
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

	return false;
}

function order_total($order_id)
{
	$link = connect_database();

	$query = 'SELECT order_content.quantity, goody.price ' .
		 'FROM order_content INNER JOIN goody ' .
		 'ON goody.goody_id = order_content.goody_id ' .
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

function row_count($table, $filter = '')
{
	$link = connect_database();

	$query = 'SELECT COUNT(*) FROM `' . $table . '`' . $filter;
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

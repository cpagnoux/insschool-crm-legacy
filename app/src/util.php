<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

/*
 * Hyperlinks
 */
function link_home()
{
	echo '<a href="index.php">Accueil</a>';
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

	echo '<a href="index.php?controller=overview&amp;table=' . $table .
	     '">' . $label . '</a>';
}

function link_reset_filters($table)
{
	echo '<a class="button" href="index.php?controller=overview&amp;' .
	     'action=reset_filters&amp;table=' . $table .
	     '">Réinitialiser les filtres</a>';
}

function link_previous($table, $page)
{
	if ($page == 1)
		echo '<a href="index.php?controller=overview&amp;table=' .
		     $table . '">&laquo;</a>';
	else
		echo '<a href="index.php?controller=overview&amp;table=' .
		     $table . '&amp;page=' . $page . '">&laquo;</a>';
}

function link_next($table, $page)
{
	echo '<a href="index.php?controller=overview&amp;table=' . $table .
	     '&amp;page=' . $page . '">&raquo;</a>';
}

function link_page($table, $page)
{
	if ($page == 1)
		echo '<a href="index.php?controller=overview&amp;table=' .
		     $table . '">' . $page . '</a>';
	else
		echo '<a href="index.php?controller=overview&amp;table=' .
		     $table . '&amp;page=' . $page . '">' . $page . '</a>';
}

function link_entity($table, $id, $label = null)
{
	if (isset($label))
		echo '<a href="index.php?controller=entity&amp;table=' .
		     $table . '&amp;id=' . $id . '">' . $label . '</a>';
	else
		echo '<a class="button" href="index.php?' .
		     'controller=entity&amp;table=' . $table . '&amp;id=' .
		     $id . '">+ d\'infos</a>';
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
	case 'user':
		$label = 'Nouvel utilisateur';
		break;
	default:
		$label = 'Ajouter';
		break;
	}

	if (isset($id))
		echo '<a class="button" href="index.php?' .
		     'controller=entity&amp;action=add&amp;table=' . $table .
		     '&amp;id=' . $id . '">' . $label . '</a>';
	else
		echo '<a class="button" href="index.php?' .
		     'controller=entity&amp;action=add&amp;table=' . $table .
		     '">' . $label . '</a>';
}

function link_modify_entity($table, $id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=modify&amp;table=' . $table . '&amp;id=' . $id . 
	     '">Modifier</a>';
}

function link_delete_entity($table, $id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=delete&amp;table=' . $table . '&amp;id=' . $id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_toggle_volunteer($member_id, $volunteer)
{
	$state = '';
	$label = 'Non';

	if ($volunteer) {
		$state = ' true';
		$label = 'Oui';
	}

	echo '<a class="button' . $state .
	     '" href="index.php?controller=entity&amp;' .
	     'action=toggle_volunteer&amp;member_id=' . $member_id . '">' .
	     $label . '</a>';
}

function link_quantity_minus($order_id, $goody_id, $quantity)
{
	echo '<a href="index.php?controller=entity&amp;' .
	     'action=modify_quantity&amp;order_id=' . $order_id .
	     '&amp;goody_id=' . $goody_id . '&amp;quantity=' . $quantity .
	     '"><span class="entypo entypo-minus-sign"></span></a>';
}

function link_quantity_plus($order_id, $goody_id, $quantity)
{
	echo '<a href="index.php?controller=entity&amp;' .
	     'action=modify_quantity&amp;order_id=' . $order_id .
	     '&amp;goody_id=' . $goody_id . '&amp;quantity=' . $quantity .
	     '"><span class="entypo entypo-plus-sign"></span></a>';
}

function link_remove_product($order_id, $goody_id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=modify_quantity&amp;order_id=' . $order_id .
	     '&amp;goody_id=' . $goody_id . '&amp;quantity=0">Supprimer</a>';
}

function link_empty_cart($order_id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=empty_cart&amp;order_id=' . $order_id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	     'Vider le panier</a>';
}

function link_commit_pre_registration($pre_registration_id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=commit&amp;pre_registration_id=' . $pre_registration_id .
	     '">Valider la pré-inscription</a>';
}

function link_toggle_show_participation($registration_id, $lesson_id,
					$participant)
{
	$state = '';
	$label = 'Non';

	if ($participant) {
		$state = ' true';
		$label = 'Oui';
	}

	echo '<a class="button' . $state . '" href="index.php?' .
	     'controller=entity&amp;action=toggle_show_participation&amp;' .
	     'registration_id=' . $registration_id . '&amp;lesson_id=' .
	     $lesson_id . '">' . $label . '</a>';
}

function link_remove_lesson($registration_id, $lesson_id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=remove_lesson&amp;registration_id=' . $registration_id .
	     '&amp;lesson_id=' . $lesson_id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

function link_update_absences($teacher_id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=update_absences&amp;teacher_id=' . $teacher_id .
	     '">+1</a>';
}

function link_reset_absences($teacher_id)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=reset_absences&amp;teacher_id=' . $teacher_id .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	     'Réinitialiser</a>';
}

function link_toggle_admin($username, $admin)
{
	$state = '';
	$label = 'Non';

	if ($admin) {
		$state = ' true';
		$label = 'Oui';
	}

	echo '<a class="button' . $state . '" href="index.php?' .
	     'controller=entity&amp;action=toggle_admin&amp;username=' .
	     $username . '">' . $label . '</a>';
}

function link_reset_password($username)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=reset_password&amp;username=' . $username .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">' .
	     'Réinitialiser le mot de passe</a>';
}

function link_delete_user($username)
{
	echo '<a class="button" href="index.php?controller=entity&amp;' .
	     'action=delete_user&amp;username=' . $username .
	     '" onclick="return confirm(\'Êtes-vous sûr(e) ?\')">Supprimer</a>';
}

/*
function link_send_mail($table, $id)
{
	echo '<a class="button" href="index.php?controller=send_mail&amp;' .
	     'table=' . $table . '&amp;id=' . $id . '">Envoyer un mail</a>';
}

function link_send_mail_to_multiple_recipients($table)
{
	$label = '';

	switch ($table) {
	case 'member':
		$label = 'Envoyer un mail aux adhérents sélectionnés';
		break;
	case 'teacher':
		$label = 'Envoyer un mail aux professeurs';
		break;
	default:
		$label = 'Envoyer un mail';
		break;
	}

	echo '<a class="button" href="index.php?controller=send_mail&amp;' .
	     'to=multiple_recipients&amp;table=' . $table . '">' . $label .
	     '</a>';
}

function link_send_mail_to_lesson_registrants($lesson_id, $season)
{
	echo '<a class="button" href="index.php?controller=send_mail&amp;' .
	     'to=lesson_registrants&amp;lesson_id=' . $lesson_id .
	     '&amp;season=' . $season . '">Envoyer un mail aux inscrits</a>';
}
 */

function link_send_mail($table, $id)
{
	$link = connect_database();

	$query = 'SELECT email FROM `' . $table . '` WHERE ' . $table .
		 '_id = ' . $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	$to = htmlspecialchars(urlencode($row['email']));

	echo '<a class="button" href="mailto:' . $to .
	     '" target="_blank">Envoyer un mail</a>';
}

function link_send_mail_to_multiple_recipients($table)
{
	$filter = select_filter($table);

	$link = connect_database();

	$query = 'SELECT email FROM `' . $table . '`' . $filter;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$to = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['email'] != '') {
			if ($to != '')
				$to .= ',';

			$to .= $row['email'];
		}
	}

	mysqli_free_result($result);
	mysqli_close($link);

	$to = htmlspecialchars(urlencode($to));

	$label = '';

	switch ($table) {
	case 'member':
		$label = 'Envoyer un mail aux adhérents sélectionnés';
		break;
	case 'teacher':
		$label = 'Envoyer un mail aux professeurs';
		break;
	default:
		$label = 'Envoyer un mail';
		break;
	}

	echo '<a class="button" href="mailto:' . $to . '" target="_blank">' .
	     $label . '</a>';
}

function link_send_mail_to_lesson_registrants($lesson_id, $season)
{
	$link = connect_database();

	$query = 'SELECT member.email FROM member INNER JOIN registration ' .
		 'ON registration.member_id = member.member_id ' .
		 'INNER JOIN registration_detail ' .
		 'ON registration_detail.registration_id = ' .
		 'registration.registration_id ' .
		 'WHERE registration_detail.lesson_id = ' . $lesson_id .
		 ' AND registration.season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$to = '';

	while ($row = mysqli_fetch_assoc($result)) {
		if ($row['email'] != '') {
			if ($to != '')
				$to .= ',';

			$to .= $row['email'];
		}
	}

	mysqli_free_result($result);
	mysqli_close($link);

	$to = htmlspecialchars(urlencode($to));

	echo '<a class="button" href="mailto:' . $to .
	     '" target="_blank">Envoyer un mail aux inscrits</a>';
}

function link_generate_bill($registration_id)
{
	echo '<a class="button" href="index.php?controller=generate_pdf&amp;' .
	     'document=bill&amp;registration_id=' . $registration_id .
	     '" target="_blank">Éditer une facture</a>';
}

function link_send_ticket()
{
	echo '<a href="index.php?controller=send_ticket">Assistance</a>';
}

function link_change_password()
{
	echo '<a href="index.php?controller=change_password">' .
	     'Changer de mot de passe</a>';
}

function link_logout()
{
	echo '<a href="index.php?action=logout">Déconnexion</a>';
}

function link_website()
{
	echo '<a href="' . WEBSITE_URL .
	     '">Retour vers le site d\'INS School</a>';
}

function link_pre_registration_form()
{
	echo '<a href="pre-registration.php">' .
	     'Retour vers la page de pré-inscription</a>';
}

/*
 * Redirects
 */
function redirect_home()
{
	header('Location: index.php');
}

function redirect($table, $id = null)
{
	if (isset($id))
		header('Location: index.php?controller=entity&table=' . $table .
		       '&id=' . $id);
	else
		header('Location: index.php?controller=overview&table=' .
		       $table);
}

function redirect_after_add_user()
{
	header('Location: index.php?controller=entity&action=add_user&' .
	       'status=success');
}

function redirect_after_reset_password()
{
	header('Location: index.php?controller=entity&action=reset_password&' .
	       'status=success');
}

function redirect_after_send_mail($table, $id, $status)
{
	header('Location: index.php?controller=send_mail&table=' . $table .
	       '&id=' . $id . '&status=' . $status);
}

function redirect_after_send_mail_to_multiple_recipients($table, $status)
{
	header('Location: index.php?controller=send_mail&' .
	       'to=multiple_recipients&table=' . $table . '&status=' . $status);
}

function redirect_after_send_mail_to_lesson_registrants($lesson_id, $status)
{
	header('Location: index.php?controller=send_mail&' .
	       'to=lesson_registrants&lesson_id=' . $lesson_id . '&status=' .
	       $status);
}

function redirect_after_send_ticket($status)
{
	header('Location: index.php?controller=send_ticket&status=' . $status);
}

function redirect_after_change_password()
{
	header('Location: index.php?controller=change_password&status=success');
}

/*
 * Regexp
 */
function regexp_decimal($integer_part = 2, $fractional_part = 2)
{
	echo 'pattern="([0-9]{1,' . $integer_part . '}\.[0-9]{1,' .
	     $fractional_part . '}|[0-9]{1,' . $integer_part . '})"';
}

function regexp_email()
{
	echo 'pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"';
}

function regexp_password()
{
	echo 'pattern=".{6,}"';
}

function regexp_phone_number()
{
	echo 'pattern="0[1-9][0-9]{8}"';
}

function regexp_postal_code()
{
	echo 'pattern="[0-9]{5}"';
}

function regexp_username()
{
	echo 'pattern="[a-zA-Z0-9_-]{4,24}"';
}

/*
 * Security
 */
function html_encode_strings($array)
{
	if (!isset($array))
		return;

	foreach($array as &$value)
		$value = htmlspecialchars($value);

	return $array;
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

function season_from_date($date)
{
	// date is in 'YYYY-MM-DD' format
	list($year, $month) = sscanf($date, '%d-%d');

	if ($month >= 6)
		return $year . '-' . ($year + 1);

	return ($year - 1) . '-' . $year;
}

function dates_from_period($season, $quarter, $day_of_week)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	switch ($quarter) {
	case 1:
		$year = $start_year;
		$start_month = 9;
		$end_month = 12;
		break;
	case 2:
		$year = $end_year;
		$start_month = 1;
		$end_month = 3;
		break;
	case 3:
		$year = $end_year;
		$start_month = 4;
		$end_month = 5;
		break;
	}

	$dates = array();

	for ($month = $start_month; $month <= $end_month; $month++) {
		for ($day = 1; $day <= 31; $day++) {
			$timestamp = strtotime($year . '-' .
					       sprintf('%02d', $month) . '-' .
					       sprintf('%02d', $day));

			if (date('m', $timestamp) == $month &&
			    strtoupper(date('l', $timestamp)) == $day_of_week)
				$dates[] = date('d/m', $timestamp);
		}
	}

	return $dates;
}

function duration($start_time, $end_time)
{
	if ($start_time == null || $end_time == null)
		return 'N/A';

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

function eval_boolean($value, $mode = 'yes/no')
{
	$true = '';
	$false = '';

	switch ($mode) {
	case 'yes/no':
		$true = 'Oui';
		$false = 'Non';
		break;
	case 'ok/nonok':
		$true = '<span class="entypo entypo-ok"></span>';
		$false = '<span class="entypo entypo-remove"></span>';
		break;
	}

	if ($value)
		return $true;

	return $false;
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
	case 'ADVERTISING_PANEL':
		$result = 'Panneau publicitaire';
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

function eval_quarter($value)
{
	$result = '';

	switch ($value) {
	case 1:
		$result = '1er trimestre';
		break;
	case 2:
		$result = '2ème trimestre';
		break;
	case 3:
		$result = '3ème trimestre';
		break;
	}

	return $result;
}

function followed_quarters($followed_quarters_str)
{
	return str_replace(',', ', ', $followed_quarters_str);
}

function followed_quarters_to_string($followed_quarters)
{
	$string = '';

	for ($i = 1; $i <= 3; $i++) {
		if (isset($followed_quarters['followed_quarters_' . $i])) {
			if ($string != '')
				$string .= ',';

			$string .= $i;
		}
	}

	return $string;
}

function format_date($date)
{
	if ($date == null || $date == '0000-00-00' ||
	    $date == '0000-00-00 00:00:00')
		return '';

	// date is in 'YYYY-MM-DD' format
	list($year, $month, $day) = sscanf($date, '%d-%d-%d');

	return sprintf('%02d', $day) . '/' . sprintf('%02d', $month) . '/' .
	       $year;
}

function format_datetime($datetime)
{
	if ($datetime == null || $datetime == '0000-00-00 00:00:00')
		return '';

	// datetime is in 'YYYY-MM-DD HH:MM:SS' format
	list($year, $month, $day, $hour, $minute) =
			sscanf($datetime, '%d-%d-%d %d:%d');

	return sprintf('%02d', $day) . '/' . sprintf('%02d', $month) . '/' .
	       $year . ', ' . sprintf('%02d', $hour) . 'h' .
	       sprintf('%02d', $minute);
}

function format_phone_number($phone_number)
{
	if ($phone_number == null || $phone_number == '')
		return '';

	// user input is in '##########' format
	list($part1, $part2, $part3, $part4, $part5) = sscanf($phone_number,
			'%2c%2c%2c%2c%2c');

	return $part1 . ' ' . $part2 . ' ' . $part3 . ' ' . $part4 . ' ' .
	       $part5;
}

function format_time($time)
{
	if ($time == null)
		return '';

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

function int_div($dividend, $divisor)
{
	$result = $dividend / $divisor;

	return (int) $result;
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

function reverse_format_phone_number($phone_number)
{
	if ($phone_number == null || $phone_number == '')
		return '';

	// stored data is in '## ## ## ## ##' format
	list($part1, $part2, $part3, $part4, $part5) = sscanf($phone_number,
			'%2c %2c %2c %2c %2c');

	return $part1 . $part2 . $part3 . $part4 . $part5;
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
function earnings_from_goody($goody_id, $season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_payment.amount FROM order_payment ' .
		 'INNER JOIN `order` ' .
		 'ON order.order_id = order_payment.order_id ' .
		 'INNER JOIN order_content ' .
		 'ON order_content.order_id = order.order_id ' .
		 'WHERE order_content.goody_id = ' . $goody_id .
		 ' AND order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$earnings = 0;

	while ($row = mysqli_fetch_assoc($result))
		$earnings += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $earnings);
}

function earnings_from_orders($season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_payment.amount FROM order_payment ' .
		 'INNER JOIN `order` ' .
		 'ON order.order_id = order_payment.order_id ' .
		 'WHERE order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$earnings = 0;

	while ($row = mysqli_fetch_assoc($result))
		$earnings += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $earnings);
}

function earnings_from_registrations($season)
{
	$link = connect_database();

	$query = 'SELECT registration_payment.amount ' .
		 'FROM registration_payment INNER JOIN registration ' .
		 'ON registration.registration_id = ' .
		 'registration_payment.registration_id ' .
		 'WHERE registration.season = "' . $season . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$earnings = 0;

	while ($row = mysqli_fetch_assoc($result))
		$earnings += $row['amount'];

	mysqli_free_result($result);
	mysqli_close($link);

	return sprintf('%.2f', $earnings);
}

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

	$row = html_encode_strings($row);

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

	$row = html_encode_strings($row);

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

	$row = html_encode_strings($row);

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

	$row = html_encode_strings($row);

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

function goodies_sold($goody_id, $season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_content.quantity, order.order_id ' .
		 'FROM order_content INNER JOIN `order` ' .
		 'ON order.order_id = order_content.order_id ' .
		 'WHERE order_content.goody_id = ' . $goody_id .
		 ' AND order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$goodies_sold = 0;

	while ($row = mysqli_fetch_assoc($result)) {
		if (order_paid($row['order_id']))
			$goodies_sold += $row['quantity'];
	}

	mysqli_free_result($result);
	mysqli_close($link);

	return $goodies_sold;
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

function member_count($season)
{
	return row_count('registration', ' WHERE season = "' . $season . '"');
}

function order_paid($order_id)
{
	return (total_paid('order', $order_id) == order_total($order_id));
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

function registration_complete($registration_id)
{
	$link = connect_database();

	$query = 'SELECT price FROM registration WHERE registration_id = ' .
		 $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return ($row['price'] != 0);
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

	return ($row['medical_certificate'] && $row['insurance'] &&
		$row['photo'] && $row['stamped_envelope']);
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

function registration_ok($registration_id)
{
	return (registration_complete($registration_id) &&
		registration_file_complete($registration_id) &&
		registration_paid($registration_id));
}

function registration_paid($registration_id)
{
	return (total_paid('registration', $registration_id) ==
		registration_price($registration_id));
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

function total_goodies_sold($season)
{
	// season is in 'YYYY-YYYY' format
	list($start_year, $end_year) = sscanf($season, '%d-%d');

	$date_min = $start_year . '-09-01';
	$date_max = $end_year . '-08-31';

	$link = connect_database();

	$query = 'SELECT order_content.quantity, order.order_id ' .
		 'FROM order_content INNER JOIN `order` ' .
		 'ON order.order_id = order_content.order_id ' .
		 'WHERE order.date BETWEEN "' . $date_min . '" AND "' .
		 $date_max . '"';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$goodies_sold = 0;

	while ($row = mysqli_fetch_assoc($result)) {
		if (order_paid($row['order_id']))
			$goodies_sold += $row['quantity'];
	}

	mysqli_free_result($result);
	mysqli_close($link);

	return $goodies_sold;
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

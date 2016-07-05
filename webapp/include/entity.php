<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/libentity.php';

include_once 'include/connection.php';
include_once 'include/error.php';
include_once 'include/util.php';

include_once 'include/libpre-registration.php';
include_once 'include/table.php';

/*
 * Display of entity
 */
function display_entity_goody($row)
{
	echo '<h2>Goodies</h2>' . PHP_EOL;

	echo '<b>Référence :</b> ' . $row['goody_id'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Désignation :</b> ' . $row['name'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Description :</b> ' . $row['description'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Prix :</b> ' . $row['price'] . ' €<br>' . PHP_EOL;
	echo '<b>Stock :</b> ' . $row['stock'] . '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_modify_entity('goody', $row['goody_id']) . ' ' .
	     link_delete_entity('goody', $row['goody_id']) . '<br>' . PHP_EOL;
}

function display_entity_lesson($row)
{
	echo '<h2>Cours</h2>' . PHP_EOL;

	echo '<b>Référence :</b> ' . $row['lesson_id'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Intitulé :</b> ' . $row['title'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Professeur :</b> ' . get_name('teacher', $row['teacher_id']) .
	     '<br>' . PHP_EOL;
	echo '<b>Jour :</b> ' . $row['day'] . '<br>' . PHP_EOL;
	echo '<b>Heure de début :</b> ' . $row['start_time'] . '<br>' . PHP_EOL;
	echo '<b>Heure de fin :</b> ' . $row['end_time'] . '<br>' . PHP_EOL;
	echo '<b>Durée :</b> ' .
	     duration($row['start_time'], $row['end_time']) . '<br>' . PHP_EOL;
	echo '<b>Salle :</b> ' . get_room_name($row['room_id']) . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Costume :</b> ' . $row['costume'] . '<br>' . PHP_EOL;
	echo '<b>T-shirt :</b> ' . $row['t_shirt'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Nombre d\'inscrits :</b> ' .
	     lesson_subscriber_count($row['lesson_id']) . '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_modify_entity('lesson', $row['lesson_id']) . ' ' .
	     link_delete_entity('lesson', $row['lesson_id']) . '<br>' . PHP_EOL;
}

function display_entity_member($link, $row)
{
	echo '<h2>Adhérent</h2>' . PHP_EOL;

	echo '<b>N° d\'adhérent :</b> ' . $row['member_id'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Nom :</b> ' . $row['last_name'] . '<br>' . PHP_EOL;
	echo '<b>Prénom :</b> ' . $row['first_name'] . '<br>' . PHP_EOL;
	echo '<b>Date de naissance :</b> ' . $row['birth_date'] . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Adresse :</b> ' . $row['adress'] . '<br>' . PHP_EOL;
	echo '<b>Code postal :</b> ' . $row['postal_code'] . '<br>' . PHP_EOL;
	echo '<b>Ville :</b> ' . $row['city'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Portable :</b> ' . $row['cellphone'] . '<br>' . PHP_EOL;
	echo '<b>Portable père :</b> ' . $row['cellphone_father'] . '<br>' .
	     PHP_EOL;
	echo '<b>Portable mère :</b> ' . $row['cellphone_mother'] . '<br>' .
	     PHP_EOL;
	echo '<b>Fixe :</b> ' . $row['phone'] . '<br>' . PHP_EOL;
	echo '<b>Email :</b> ' . $row['email'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Bénévole :</b> ' . evaluate_boolean($row['volunteer']) .
	     '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_modify_entity('member', $row['member_id']) . ' ' .
	     link_delete_entity('member', $row['member_id']) . '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	display_entity_member_file($link, $row['member_id']);

	echo '<br>' . PHP_EOL;
	display_entity_member_registrations($link, $row['member_id']);
}

function display_entity_order($link, $row)
{
	echo '<h2>Commande</h2>' . PHP_EOL;

	echo '<b>N° de commande :</b> ' . $row['order_id'] . '<br>' . PHP_EOL;
	echo '<b>Adhérent :</b> ' . get_name('member', $row['member_id']) .
	     '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Date :</b> ' . $row['date'] . '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	display_entity_order_content($link, $row['order_id']);

	echo link_modify_entity('order', $row['order_id']) . ' ' .
	     link_delete_entity('order', $row['order_id']) . '<br>' . PHP_EOL;
}

function display_entity_pre_registration($row)
{
	echo '<h2>Pré-inscription</h2>' . PHP_EOL;

	echo '<b>N° de pré-inscription :</b> ' . $row['pre_registration_id'] .
	     '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Nom :</b> ' . $row['last_name'] . '<br>' . PHP_EOL;
	echo '<b>Prénom :</b> ' . $row['first_name'] . '<br>' . PHP_EOL;
	echo '<b>Date de naissance :</b> ' . $row['birth_date'] . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Adresse :</b> ' . $row['adress'] . '<br>' . PHP_EOL;
	echo '<b>Code postal :</b> ' . $row['postal_code'] . '<br>' . PHP_EOL;
	echo '<b>Ville :</b> ' . $row['city'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Portable :</b> ' . $row['cellphone'] . '<br>' . PHP_EOL;
	echo '<b>Portable père :</b> ' . $row['cellphone_father'] . '<br>' .
	     PHP_EOL;
	echo '<b>Portable mère :</b> ' . $row['cellphone_mother'] . '<br>' .
	     PHP_EOL;
	echo '<b>Fixe :</b> ' . $row['phone'] . '<br>' . PHP_EOL;
	echo '<b>Email :</b> ' . $row['email'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Cours choisi(s) :</b> ' . chosen_lessons($row['lessons']) .
	     '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_commit_pre_registration($row['pre_registration_id']) . ' ' .
	     link_modify_entity('pre_registration',
				$row['pre_registration_id']) . ' ' .
	     link_delete_entity('pre_registration',
				$row['pre_registration_id']) . '<br>' . PHP_EOL;
}

function display_entity_registration($link, $row)
{
	echo '<h2>Inscription</h2>' . PHP_EOL;

	echo '<b>N° d\'inscription :</b> ' . $row['registration_id'] . '<br>' .
	     PHP_EOL;
	echo '<b>Adhérent :</b> ' . get_name('member', $row['member_id']) .
	     '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Saison :</b> ' . $row['season'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Formule :</b> ' . $row['formula'] . ' cours<br>' . PHP_EOL;
	echo '<b>Tarif :</b> ' . $row['price'] . ' €<br>' . PHP_EOL;
	echo '<b>Réduction :</b> ' . $row['discount'] . ' %<br>' . PHP_EOL;
	echo '<b>Tarif après réduction :</b> ' .
	     price_after_discount($row['price'], $row['discount']) . ' €<br>' .
	     PHP_EOL;
	echo '<b>Nombre de paiements :</b> ' . $row['payments'] . '<br>' .
	     PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_modify_entity('registration', $row['registration_id']) . ' ' .
	     link_delete_entity('registration', $row['registration_id']) .
	     '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	display_entity_registration_payments($link, $row['registration_id']);
}

function display_entity_room($row)
{
	echo '<h2>Salle</h2>' . PHP_EOL;

	echo '<b>N° de salle :</b> ' . $row['room_id'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Nom :</b> ' . $row['name'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Adresse :</b> ' . $row['adress'] . '<br>' . PHP_EOL;
	echo '<b>Code postal :</b> ' . $row['postal_code'] . '<br>' . PHP_EOL;
	echo '<b>Ville :</b> ' . $row['city'] . '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_modify_entity('room', $row['room_id']) . ' ' .
	     link_delete_entity('room', $row['room_id']) . '<br>' . PHP_EOL;
}

function display_entity_teacher($row)
{
	echo '<h2>Professeur</h2>' . PHP_EOL;

	echo '<b>Identifiant :</b> ' . $row['teacher_id'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Nom :</b> ' . $row['last_name'] . '<br>' . PHP_EOL;
	echo '<b>Prénom :</b> ' . $row['first_name'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Adresse :</b> ' . $row['adress'] . '<br>' . PHP_EOL;
	echo '<b>Code postal :</b> ' . $row['postal_code'] . '<br>' . PHP_EOL;
	echo '<b>Ville :</b> ' . $row['city'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Portable :</b> ' . $row['cellphone'] . '<br>' . PHP_EOL;
	echo '<b>Fixe :</b> ' . $row['phone'] . '<br>' . PHP_EOL;
	echo '<b>Email :</b> ' . $row['email'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Absences :</b> ' . $row['absences'] . '<br>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo link_modify_entity('teacher', $row['teacher_id']) . ' ' .
	     link_delete_entity('teacher', $row['teacher_id']) . '<br>' .
	     PHP_EOL;
}

function display_entity($table, $id)
{
	$link = connect_database();

	$query = 'SELECT * FROM `' . $table . '` WHERE ' . $table . '_id = ' .
		 $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	switch ($table) {
	case 'goody':
		display_entity_goody($row);
		break;
	case 'lesson':
		display_entity_lesson($row);
		break;
	case 'member':
		display_entity_member($link, $row);
		break;
	case 'order':
		display_entity_order($link, $row);
		break;
	case 'pre_registration':
		display_entity_pre_registration($row);
		break;
	case 'registration':
		display_entity_registration($link, $row);
		break;
	case 'room':
		display_entity_room($row);
		break;
	case 'teacher':
		display_entity_teacher($row);
		break;
	}

	mysqli_free_result($result);
	mysqli_close($link);
}

/*
 * Forms for entity add
 */
function form_add_entity_contains($order_id)
{
	echo '<h2>Ajouter un article</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=contains" method="post">' . PHP_EOL;

	form_entity_contains($order_id);

	echo '</form>' . PHP_EOL;
}

function form_add_entity_file($member_id)
{
	echo '<h2>Nouveau dossier</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=file" method="post">' . PHP_EOL;

	form_entity_file($member_id);

	echo '</form>' . PHP_EOL;
}

function form_add_entity_goody()
{
	echo '<h2>Nouveau goodies</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=goody" method="post">' . PHP_EOL;

	form_entity_goody();

	echo '</form>' . PHP_EOL;
}

function form_add_entity_lesson()
{
	echo '<h2>Nouveau cours</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=lesson" method="post">' . PHP_EOL;

	form_entity_lesson();

	echo '</form>' . PHP_EOL;
}

function form_add_entity_member()
{
	echo '<h2>Nouvel adhérent</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=member" method="post">' . PHP_EOL;

	form_entity_member();

	echo '</form>' . PHP_EOL;
}

function form_add_entity_order()
{
	echo '<h2>Nouvelle commande</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=order" method="post">' . PHP_EOL;

	form_entity_order();

	echo '</form>' . PHP_EOL;
}

function form_add_entity_payment($registration_id)
{
	echo '<h2>Nouveau paiement</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=payment" method="post">' . PHP_EOL;

	form_entity_payment($registration_id);

	echo '</form>' . PHP_EOL;
}

function form_add_entity_registration($member_id)
{
	echo '<h2>Nouvelle inscription</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=registration" method="post">' . PHP_EOL;

	form_entity_registration($member_id);

	echo '</form>' . PHP_EOL;
}

function form_add_entity_room()
{
	echo '<h2>Nouvelle salle</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=room" method="post">' . PHP_EOL;

	form_entity_room();

	echo '</form>' . PHP_EOL;
}

function form_add_entity_teacher()
{
	echo '<h2>Nouveau professeur</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=add&amp;table=teacher" method="post">' . PHP_EOL;

	form_entity_teacher();

	echo '</form>' . PHP_EOL;
}

function form_add_entity($table, $id)
{
	switch ($table) {
	case 'contains':
		form_add_entity_contains($id);
		break;
	case 'file':
		form_add_entity_file($id);
		break;
	case 'goody':
		form_add_entity_goody();
		break;
	case 'lesson':
		form_add_entity_lesson();
		break;
	case 'member':
		form_add_entity_member();
		break;
	case 'order':
		form_add_entity_order();
		break;
	case 'payment':
		form_add_entity_payment($id);
		break;
	case 'registration':
		form_add_entity_registration($id);
		break;
	case 'room':
		form_add_entity_room();
		break;
	case 'teacher':
		form_add_entity_teacher();
		break;
	}
}

/*
 * Add of entity
 */
function add_entity_contains($link, $data)
{
	$query = 'INSERT INTO contains VALUES (' . $data['order_id'] . ', ' .
		 $data['goody_id'] . ', ' . $data['quantity'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('order', $data['order_id']);
}

function add_entity_file($link, $data)
{
	$query = 'INSERT INTO file VALUES ("", ' . $data['member_id'] . ', ' .
		 $data['medical_certificate'] . ', ' . $data['insurance'] .
		 ', ' . $data['photo'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('member', $data['member_id']);
}

function add_entity_goody($link, $data)
{
	$query = 'INSERT INTO goody VALUES ("", "' . $data['name'] . '", "' .
		 $data['description'] . '", ' . $data['price'] . ', ' .
		 $data['stock'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_table('goody');
}

function add_entity_lesson($link, $data)
{
	$query = 'INSERT INTO lesson VALUES ("", "' . $data['title'] . '", ' .
		 $data['teacher_id'] . ', "' . $data['day'] . '", "' .
		 $data['start_time'] . '", "' . $data['end_time'] . '", ' .
		 $data['room_id'] . ', "' . $data['costume'] . '", "' .
		 $data['t_shirt'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_table('lesson');
}

function add_entity_member($link, $data)
{
	$query = 'INSERT INTO member VALUES ("", "' . $data['first_name'] .
		 '", "' . $data['last_name'] . '", "' . $data['birth_date'] .
		 '", "' . $data['adress'] . '", "' . $data['postal_code'] .
		 '", "' . $data['city'] . '", "' . $data['cellphone'] . '", "' .
		 $data['cellphone_father'] . '", "' .
		 $data['cellphone_mother'] . '", "' . $data['phone'] . '", "' .
		 $data['email'] . '", ' . $data['volunteer'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_table('member');
}

function add_entity_order($link, $data)
{
	$query = 'INSERT INTO `order` VALUES ("", ' . $data['member_id'] .
		 ', "' . $data['date'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_table('order');
}

function add_entity_payment($link, $data)
{
	$query = 'INSERT INTO payment VALUES ("", ' . $data['registration_id'] .
		 ', "' . $data['mode'] . '", ' . $data['amount'] . ', "' .
		 $data['date'] . '")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('registration', $data['registration_id']);
}

function add_entity_registration($link, $data)
{
	$query = 'INSERT INTO registration VALUES ("", ' . $data['member_id'] .
		 ', "' . $data['season'] . '", ' . $data['formula'] . ', ' .
		 $data['price'] . ', ' . $data['discount'] . ', ' .
		 $data['payments'] . ')';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('member', $data['member_id']);
}

function add_entity_room($link, $data)
{
	$query = 'INSERT INTO room VALUES ("", "' . $data['name'] . '", "' .
		 $data['adress'] . '", "' . $data['postal_code'] . '", "' .
		 $data['city'] . '", "")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_table('room');
}

function add_entity_teacher($link, $data)
{
	$query = 'INSERT INTO teacher VALUES ("", "' . $data['first_name'] .
		 '", "' . $data['last_name'] . '", "' . $data['adress'] .
		 '", "' . $data['postal_code'] . '", "' . $data['city'] .
		 '", "' . $data['cellphone'] . '", "' . $data['phone'] .
		 '", "' . $data['email'] . '", "")';
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_table('teacher');
}

function add_entity($table, $data)
{
	$link = connect_database();

	switch ($table) {
	case 'contains':
		add_entity_contains($link, $data);
		break;
	case 'file':
		add_entity_file($link, $data);
		break;
	case 'goody':
		add_entity_goody($link, $data);
		break;
	case 'lesson':
		add_entity_lesson($link, $data);
		break;
	case 'member':
		add_entity_member($link, $data);
		break;
	case 'order':
		add_entity_order($link, $data);
		break;
	case 'payment':
		add_entity_payment($link, $data);
		break;
	case 'registration':
		add_entity_registration($link, $data);
		break;
	case 'room':
		add_entity_room($link, $data);
		break;
	case 'teacher':
		add_entity_teacher($link, $data);
		break;
	}

	mysqli_close($link);
}

/*
 * Forms for entity modification
 */
function form_modify_entity_file($row)
{
	echo '<h2>Modifier le dossier</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=file&amp;id=' . $row['file_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_file($row['member_id'], $row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_goody($row)
{
	echo '<h2>Modifier le goodies</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=goody&amp;id=' . $row['goody_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_goody($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_lesson($row)
{
	echo '<h2>Modifier le cours</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=lesson&amp;id=' . $row['lesson_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_lesson($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_member($row)
{
	echo '<h2>Modifier l\'adhérent</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=member&amp;id=' . $row['member_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_member($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_order($row)
{
	echo '<h2>Modifier la commande</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=order&amp;id=' . $row['order_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_order($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_payment($row)
{
	echo '<h2>Modifier le paiement</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=payment&amp;id=' . $row['payment_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_payment($row['registration_id'], $row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_pre_registration($row)
{
	echo '<h2>Modifier la pré-inscription</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=pre_registration&amp;id=' .
	     $row['pre_registration_id'] . '" method="post">' . PHP_EOL;

	form_entity_pre_registration($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_registration($row)
{
	echo '<h2>Modifier l\'inscription</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=registration&amp;id=' .
	     $row['registration_id'] . '" method="post">' . PHP_EOL;

	form_entity_registration($row['member_id'], $row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_room($row)
{
	echo '<h2>Modifier la salle</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=room&amp;id=' . $row['room_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_room($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity_teacher($row)
{
	echo '<h2>Modifier le professeur</h2>' . PHP_EOL;

	echo '<form action="' . $_SERVER['PHP_SELF'] .
	     '?mode=modify&amp;table=teacher&amp;id=' . $row['teacher_id'] .
	     '" method="post">' . PHP_EOL;

	form_entity_teacher($row);

	echo '</form>' . PHP_EOL;
}

function form_modify_entity($table, $id)
{
	$link = connect_database();

	$query = 'SELECT * FROM `' . $table . '` WHERE ' . $table . '_id = ' .
		 $id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	switch ($table) {
	case 'file':
		form_modify_entity_file($row);
		break;
	case 'goody':
		form_modify_entity_goody($row);
		break;
	case 'lesson':
		form_modify_entity_lesson($row);
		break;
	case 'member':
		form_modify_entity_member($row);
		break;
	case 'order':
		form_modify_entity_order($row);
		break;
	case 'payment':
		form_modify_entity_payment($row);
		break;
	case 'pre_registration':
		form_modify_entity_pre_registration($row);
		break;
	case 'registration':
		form_modify_entity_registration($row);
		break;
	case 'room':
		form_modify_entity_room($row);
		break;
	case 'teacher':
		form_modify_entity_teacher($row);
		break;
	}

	mysqli_free_result($result);
	mysqli_close($link);
}

/*
 * Modification of entity
 */
function modify_entity_file($link, $file_id, $data)
{
	$query = 'UPDATE file SET medical_certificate = ' .
		 $data['medical_certificate'] . ', insurance = ' .
		 $data['insurance'] . ', photo = ' . $data['photo'] .
		 ' WHERE file_id = ' . $file_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('member', $data['member_id']);
}

function modify_entity_goody($link, $goody_id, $data)
{
	$query = 'UPDATE goody SET name = "' . $data['name'] .
		 '", description = "' . $data['description'] . '", price = ' .
		 $data['price'] . ', stock = ' . $data['stock'] .
		 ' WHERE goody_id = ' . $goody_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('goody', $goody_id);
}

function modify_entity_lesson($link, $lesson_id, $data)
{
	$query = 'UPDATE lesson SET title =  "' . $data['title'] .
		 '", teacher_id = ' . $data['teacher_id'] . ', day = "' .
		 $data['day'] . '", start_time = "' . $data['start_time'] .
		 '", end_time = "' . $data['end_time'] . '", room_id = ' .
		 $data['room_id'] . ', costume = "' . $data['costume'] .
		 '", t_shirt = "' . $data['t_shirt'] . '" WHERE lesson_id = ' .
		 $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('lesson', $lesson_id);
}

function modify_entity_member($link, $member_id, $data)
{
	$query = 'UPDATE member SET last_name = "' . $data['last_name'] .
		 '", first_name = "' . $data['first_name'] .
		 '", birth_date = "' . $data['birth_date'] . '", adress = "' .
		 $data['adress'] . '", postal_code = "' . $data['postal_code'] .
		 '", city = "' . $data['city'] . '", cellphone = "' .
		 $data['cellphone'] . '", cellphone_father = "' .
		 $data['cellphone_father'] . '", cellphone_mother = "' .
		 $data['cellphone_mother'] . '", phone = "' . $data['phone'] .
		 '", email = "' . $data['email'] . '", volunteer = ' .
		 $data['volunteer'] . ' WHERE member_id = ' . $member_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('member', $member_id);
}

function modify_entity_order($link, $order_id, $data)
{
	$query = 'UPDATE `order` SET member_id = ' . $data['member_id'] .
		 ', date = "' . $data['date'] . '" WHERE order_id = ' .
		 $order_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('order', $order_id);
}

function modify_entity_payment($link, $payment_id, $data)
{
	$query = 'UPDATE payment SET mode = "' . $data['mode'] .
		 '", amount = ' . $data['amount'] . ', date = "' .
		 $data['date'] . '" WHERE payment_id = ' . $payment_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('registration', $data['registration_id']);
}

function modify_entity_pre_registration($link, $pre_registration_id, $data)
{
	$lessons_str = lessons_to_string($data);

	$query = 'UPDATE pre_registration SET last_name = "' .
		 $data['last_name'] . '", first_name = "' .
		 $data['first_name'] . '", birth_date = "' .
		 $data['birth_date'] . '", adress = "' . $data['adress'] .
		 '", postal_code = "' . $data['postal_code'] . '", city = "' .
		 $data['city'] . '", cellphone = "' . $data['cellphone'] .
		 '", cellphone_father = "' . $data['cellphone_father'] .
		 '", cellphone_mother = "' . $data['cellphone_mother'] .
		 '", phone = "' . $data['phone'] . '", email = "' .
		 $data['email'] . '", lessons = "' . $lessons_str .
		 '" WHERE pre_registration_id = ' . $pre_registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('pre_registration', $pre_registration_id);
}

function modify_entity_registration($link, $registration_id, $data)
{
	$query = 'UPDATE registration SET season = "' . $data['season'] .
		 '", formula = ' . $data['formula'] . ', price = ' .
		 $data['price'] . ', discount = ' . $data['discount'] .
		 ', payments = ' . $data['payments'] .
		 ' WHERE registration_id = ' . $registration_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('registration', $registration_id);
}

function modify_entity_room($link, $room_id, $data)
{
	$query = 'UPDATE room SET name = "' . $data['name'] . '", adress = "' .
		 $data['adress'] . '", postal_code = "' . $data['postal_code'] .
		 '", city = "' . $data['city'] . '" WHERE room_id = ' .
		 $room_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('room', $room_id);
}

function modify_entity_teacher($link, $teacher_id, $data)
{
	$query = 'UPDATE teacher SET last_name = "' . $data['last_name'] .
		 '", first_name = "' . $data['first_name'] . '", adress = "' .
		 $data['adress'] . '", postal_code = "' . $data['postal_code'] .
		 '", city = "' . $data['city'] . '", cellphone = "' .
		 $data['cellphone'] . '", phone = "' . $data['phone'] .
		 '", email = "' . $data['email'] . '" WHERE teacher_id = ' .
		 $teacher_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_entity('teacher', $teacher_id);
}

function modify_entity($table, $id, $data)
{
	$link = connect_database();

	switch($table) {
	case 'file':
		modify_entity_file($link, $id, $data);
		break;
	case 'goody':
		modify_entity_goody($link, $id, $data);
		break;
	case 'lesson':
		modify_entity_lesson($link, $id, $data);
		break;
	case 'member':
		modify_entity_member($link, $id, $data);
		break;
	case 'order':
		modify_entity_order($link, $id, $data);
		break;
	case 'payment':
		modify_entity_payment($link, $id, $data);
		break;
	case 'pre_registration':
		modify_entity_pre_registration($link, $id, $data);
		break;
	case 'registration':
		modify_entity_registration($link, $id, $data);
		break;
	case 'room':
		modify_entity_room($link, $id, $data);
		break;
	case 'teacher':
		modify_entity_teacher($link, $id, $data);
		break;
	}

	mysqli_close($link);
}

/*
 * Deletion of entity
 */
function delete_entity($table, $id)
{
	$link = connect_database();

	check_dependencies($link, $table, $id);

	$query = 'DELETE FROM `' . $table . '` WHERE ' . $table . '_id = ' .
		 $id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);
}

/*
 * Modification of product quantity in orders
 */
function modify_quantity($order_id, $goody_id, $quantity)
{
	$link = connect_database();

	if ($quantity == 0 || !is_numeric($quantity))
		$query = 'DELETE FROM contains WHERE order_id = ' . $order_id .
			 ' AND goody_id = ' . $goody_id;
	else
		$query = 'UPDATE contains SET quantity = ' . $quantity .
			 ' WHERE order_id = ' . $order_id . ' AND goody_id = ' .
			 $goody_id;

	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	mysqli_close($link);

	display_entity('order', $order_id);
}
?>

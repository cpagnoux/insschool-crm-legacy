<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/error.php';
include_once 'include/util.php';

include_once 'include/libpre-registration.php';
include_once 'include/entity.php';

/*
 * Helper functions for displaying member entity
 */
function display_file($result, $member_id)
{
	echo '<h2>Dossier</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun dossier<br>' . PHP_EOL;
		echo '<br>' . PHP_EOL;
		echo link_add_entity('file', $member_id) . '<br>' .
		     PHP_EOL;
		return;
	}

	$row = mysqli_fetch_assoc($result);

	echo '<b>N° de dossier :</b> ' . $row['file_id'] . '<br>' . PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Certificat médical :</b> ' .
	     evaluate_boolean($row['medical_certificate']) . '<br>' . PHP_EOL;
	echo '<b>Assurance :</b> ' . evaluate_boolean($row['insurance']) .
	     '<br>' . PHP_EOL;
	echo '<b>Photo :</b> ' . evaluate_boolean($row['photo']) . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo '<b>Dossier complet :</b> ' .
	     evaluate_boolean(file_complete($row['file_id'])) . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo link_modify_entity('file', $row['file_id']) . '<br>' . PHP_EOL;
}

function display_entity_member_file($link, $member_id)
{
	$query = 'SELECT * FROM file WHERE member_id = ' . $member_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_file($result, $member_id);

	mysqli_free_result($result);
}

function display_registrations($result)
{
	echo '<h2>Inscriptions</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucune inscription<br>' . PHP_EOL;
		return;
	}

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>N° d\'inscription</b></th>' . PHP_EOL;
	echo '    <th><b>Saison</b></th>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['registration_id'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['season'] . '</td>' . PHP_EOL;
		echo '    <td>' . link_entity('registration',
					      $row['registration_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;
}

function display_entity_member_registrations($link, $member_id)
{
	$query = 'SELECT * FROM registration WHERE member_id = ' . $member_id .
		 ' ORDER BY season DESC';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_registrations($result);

	echo '<br>' . PHP_EOL;
	echo link_add_entity('registration', $member_id) . '<br>' .
	     PHP_EOL;

	mysqli_free_result($result);
}

/*
 * Helper functions for displaying order entity
 */
function display_content($result, $order_id)
{
	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun article<br>' . PHP_EOL;
		return;
	}

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>Référence</b></th>' . PHP_EOL;
	echo '    <th><b>Désignation</b></th>' . PHP_EOL;
	echo '    <th><b>Prix unitaire</b></th>' . PHP_EOL;
	echo '    <th><b>Quantité</b></th>' . PHP_EOL;
	echo '    <th><b>Prix total</b></th>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['goody_id'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['name'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['price'] . ' €</td>' . PHP_EOL;
		echo '    <td>' . $row['quantity'] . '</td>' . PHP_EOL;
		echo '    <td>' .
		     total_by_product($row['price'], $row['quantity']) .
		     ' €</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo '<b>TOTAL :</b> ' . order_total($order_id) . ' €<br>' . PHP_EOL;
}

function display_entity_order_content($link, $order_id)
{
	$query = 'SELECT contains.goody_id, contains.quantity, goody.name,
		  goody.price FROM contains INNER JOIN goody
		  ON contains.goody_id = goody.goody_id
		  WHERE contains.order_id = ' . $order_id .
		 ' ORDER BY contains.goody_id';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_content($result, $order_id);

	echo '<br>' . PHP_EOL;
	echo link_add_entity('contains', $order_id) . '<br>' . PHP_EOL;

	mysqli_free_result($result);
}

/*
 * Helper functions for displaying registration entity
 */
function display_payments($result, $registration_id)
{
	echo '<h2>Paiements</h2>' . PHP_EOL;

	if (mysqli_num_rows($result) == 0) {
		echo 'Aucun paiement<br>' . PHP_EOL;
		return;
	}

	echo '<table>' . PHP_EOL;

	echo '  <tr>' . PHP_EOL;
	echo '    <th><b>N° de paiement</b></th>' . PHP_EOL;
	echo '    <th><b>Mode de paiement</b></th>' . PHP_EOL;
	echo '    <th><b>Montant</b></th>' . PHP_EOL;
	echo '    <th><b>Date</b></th>' . PHP_EOL;
	echo '    <th></th>' . PHP_EOL;
	echo '  </tr>' . PHP_EOL;

	while ($row = mysqli_fetch_assoc($result)) {
		echo '  <tr>' . PHP_EOL;
		echo '    <td>' . $row['payment_id'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['mode'] . '</td>' . PHP_EOL;
		echo '    <td>' . $row['amount'] . ' €</td>' . PHP_EOL;
		echo '    <td>' . $row['date'] . '</td>' . PHP_EOL;
		echo '    <td>' .
		     link_modify_entity('payment', $row['payment_id']) .
		     '</td>' . PHP_EOL;
		echo '  </tr>' . PHP_EOL;
	}

	echo '</table>' . PHP_EOL;

	echo '<br>' . PHP_EOL;
	echo '<b>Total payé :</b> ' .
	     registration_total_paid($registration_id) . ' €<br>' . PHP_EOL;
}

function display_entity_registration_payments($link, $registration_id)
{
	$query = 'SELECT * FROM payment WHERE registration_id = ' .
		 $registration_id . ' ORDER BY date';
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	display_payments($result, $registration_id);

	echo '<br>' . PHP_EOL;
	echo '<b>Inscription réglée :</b> ' .
	     evaluate_boolean(registration_paid($registration_id)) . '<br>' .
	     PHP_EOL;
	echo '<br>' . PHP_EOL;
	echo link_add_entity('payment', $registration_id) . '<br>' .
	     PHP_EOL;

	mysqli_free_result($result);
}

/*
 * Forms' content
 */
function form_entity_contains($order_id)
{
	echo '  N° de commande <sup>*</sup> : <input type="text" ' .
	     'name="order_id" value="' . $order_id . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Référence de l\'article <sup>*</sup> : <input type="text" ' .
	     'name="goody_id"><br>' . PHP_EOL;
	echo '  Quantité <sup>*</sup> : <input type="text" name="quantity">' .
	     '<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_file($member_id, $row)
{
	$medical_certificate_true = '';
	$medical_certificate_false = '';
	$insurance_true = '';
	$insurance_false = '';
	$photo_true = '';
	$photo_false = '';

	if (isset($row)) {
		if ($row['medical_certificate'])
			$medical_certificate_true = ' checked="checked"';
		else
			$medical_certificate_false = ' checked="checked"';

		if ($row['insurance'])
			$insurance_true = ' checked="checked"';
		else
			$insurance_false = ' checked="checked"';

		if ($row['photo'])
			$photo_true = ' checked="checked"';
		else
			$photo_false = ' checked="checked"';
	}

	echo '  N° d\'adhérent <sup>*</sup> : <input type="text" ' .
	     'name="member_id" value="' . $member_id . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Certificat médical : <input type="radio" ' .
	     'name="medical_certificate" value="1"' .
	     $medical_certificate_true . '> oui <input type="radio" ' .
	     'name="medical_certificate" value="0"' .
	     $medical_certificate_false . '> non<br>' . PHP_EOL;
	echo '  Assurance : <input type="radio" name="insurance" value="1"' .
	     $insurance_true . '> oui <input type="radio" name="insurance" ' .
	     'value="0"' . $insurance_false . '> non<br>' . PHP_EOL;
	echo '  Photo : <input type="radio" name="photo" value="1"' .
	     $photo_true . '> oui <input type="radio" name="photo" value="0"' .
	     $photo_false . '> non<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_goody($row)
{
	echo '  Désignation <sup>*</sup> : <input type="text" name="name" ' .
	     'value="' . $row['name'] . '">' . '<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Description : <input type="text" name="description" value="' .
	     $row['description'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Prix : <input type="text" name="price" value="' .
	     $row['price'] . '"> €<br>' . PHP_EOL;
	echo '  Stock : <input type="text" name="stock" value="' .
	     $row['stock'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_lesson($row)
{
	echo '  Intitulé <sup>*</sup> : <input type="text" name="title" ' .
	     'value="' . $row['title'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Professeur <sup>*</sup> : <input type="text" ' .
	     'name="teacher_id" value="' . $row['teacher_id'] . '"><br>' .
	     PHP_EOL;
	echo '  Jour <sup>*</sup> : <input type="text" name="day" value="' .
	     $row['day'] . '"><br>' . PHP_EOL;
	echo '  Heure de début <sup>*</sup> : <input type="text" ' .
	     'name="start_time" value="' . $row['start_time'] . '"> ' .
	     '(HH:MM:SS)<br>' . PHP_EOL;
	echo '  Heure de fin <sup>*</sup> : <input type="text" ' .
	     'name="end_time" value="' . $row['end_time'] . '"> ' .
	     '(HH:MM:SS)<br>' . PHP_EOL;
	echo '  Salle <sup>*</sup> : <input type="text" name="room_id" ' .
	     'value="' . $row['room_id'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Costume : <input type="text" name="costume" value="' .
	     $row['costume'] . '"><br>' . PHP_EOL;
	echo '  T-shirt : <input type="text" name="t_shirt" value="' .
	     $row['t_shirt'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_member($row)
{
	$volunteer_true = '';
	$volunteer_false = '';

	if (isset($row)) {
		if ($row['volunteer'])
			$volunteer_true = ' checked="checked"';
		else
			$volunteer_false = ' checked="checked"';
	}

	echo '  Nom <sup>*</sup> : <input type="text" name="last_name" ' .
	     'value="' . $row['last_name'] . '"><br>' . PHP_EOL;
	echo '  Prénom <sup>*</sup> : <input type="text" name="first_name" ' .
	     'value="' . $row['first_name'] . '">' . '<br>' . PHP_EOL;
	echo '  Date de naissance : <input type="text" name="birth_date" ' .
	     'value="' . $row['birth_date'] . '"> (AAAA-MM-JJ)<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Adresse : <input type="text" name="adress" value="' .
	     $row['adress'] . '"><br>' . PHP_EOL;
	echo '  Code postal : <input type="text" name="postal_code" value="' .
	     $row['postal_code'] . '"><br>' . PHP_EOL;
	echo '  Ville : <input type="text" name="city" value="' . $row['city'] .
	     '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Portable : <input type="text" name="cellphone" value="' .
	     $row['cellphone'] . '"><br>' . PHP_EOL;
	echo '  Portable père : <input type="text" name="cellphone_father" ' .
	     'value="' . $row['cellphone_father'] . '">' . '<br>' . PHP_EOL;
	echo '  Portable mère : <input type="text" name="cellphone_mother" ' .
	     'value="' . $row['cellphone_mother'] . '">' . '<br>' . PHP_EOL;
	echo '  Fixe : <input type="text" name="phone" value="' .
	     $row['phone'] . '"><br>' . PHP_EOL;
	echo '  Email : <input type="text" name="email" value="' .
	     $row['email'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Bénévole : <input type="radio" name="volunteer" value="1"' .
	     $volunteer_true . '> oui <input type="radio" name="volunteer" ' .
	     'value="0"' . $volunteer_false . '> non<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

// TODO: allow to modify number of articles
function form_entity_order($row)
{
	echo '  N° d\'adhérent <sup>*</sup> : <input type="text" ' .
	     'name="member_id" value="' . $row['member_id'] . '"><br>' .
	     PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Date <sup>*</sup> : <input type="text" name="date" value="' .
	     $row['date'] . '"> (AAAA-MM-JJ)<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_payment($registration_id, $row)
{
	echo '  N° d\'inscription <sup>*</sup> : <input type="text" ' .
	     'name="registration_id" value="' . $registration_id . '"><br>' .
	     PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Mode de paiement <sup>*</sup> : <input type="text" ' .
	     'name="mode" value="' . $row['mode'] . '"><br>' . PHP_EOL;
	echo '  Montant <sup>*</sup> : <input type="text" name="amount" ' .
	     'value="' . $row['amount'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Date <sup>*</sup> : <input type="text" name="date" value="' .
	     $row['date'] . '"> (AAAA-MM-JJ)<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_pre_registration($row)
{
	$lessons = array();
	$means_of_knowledge_flyer = '';
	$means_of_knowledge_internet = '';
	$means_of_knowledge_word_of_mouth = '';

	if (isset($row)) {
		$lessons = string_to_lessons($row['lessons']);

		if ($row['means_of_knowledge'] == 'flyer')
			$means_of_knowledge_flyer = ' checked="checked"';
		else if ($row['means_of_knowledge'] == 'internet')
			$means_of_knowledge_internet = ' checked="checked"';
		else
			$means_of_knowledge_word_of_mouth = ' checked="checked"';
	}

	echo '  Nom <sup>*</sup> : <input type="text" name="last_name" ' .
	     'value="' . $row['last_name'] . '"><br>' . PHP_EOL;
	echo '  Prénom <sup>*</sup> : <input type="text" name="first_name" ' .
	     'value="' . $row['first_name'] . '"><br>' . PHP_EOL;
	echo '  Date de naissance <sup>*</sup> : <input type="text" ' .
	     'name="birth_date" value="' . $row['birth_date'] . '"> ' .
	     '(AAAA-MM-JJ)<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Adresse <sup>*</sup> : <input type="text" name="adress" ' .
	     'value="' . $row['adress'] . '"><br>' . PHP_EOL;
	echo '  Code postal <sup>*</sup> : <input type="text" ' .
	     'name="postal_code" value="' . $row['postal_code'] . '"><br>' .
	     PHP_EOL;
	echo '  Ville <sup>*</sup> : <input type="text" name="city" value="' .
	     $row['city'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Portable élève : <input type="text" name="cellphone" value="' .
	     $row['cellphone'] . '"><br>' . PHP_EOL;
	echo '  Portable père : <input type="text" name="cellphone_father" ' .
	     'value="' . $row['cellphone_father'] . '"><br>' . PHP_EOL;
	echo '  Portable mère : <input type="text" name="cellphone_mother" ' .
	     'value="' . $row['cellphone_mother'] . '"><br>' . PHP_EOL;
	echo '  Téléphone fixe : <input type="text" name="phone" value="' .
	     $row['phone'] . '"><br>' . PHP_EOL;
	echo '  E-mail : <input type="text" name="email" value="' .
	     $row['email'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <h2>Cours suivi(s)</h2>' . PHP_EOL;

	display_lessons($lessons);
	echo '  <br>' . PHP_EOL;

	if (!isset($row)) {
		display_warnings();
	}

	echo '  <br>' . PHP_EOL;
	echo '  Comment nous avez-vous connus ?<br>' . PHP_EOL;
	echo '  <input type="radio" name="means_of_knowledge" value="flyer"' .
	     $means_of_knowledge_flyer . '> Affiches, Flyers<br>' . PHP_EOL;
	echo '  <input type="radio" name="means_of_knowledge" ' .
	     'value="internet"' . $means_of_knowledge_internet .
	     '> Internet<br>' . PHP_EOL;
	echo '  <input type="radio" name="means_of_knowledge" ' .
	     'value="word_of_mouth"' . $means_of_knowledge_word_of_mouth .
	     '> Bouche-à-oreille<br>' . PHP_EOL;
	echo '  <br><br>' . PHP_EOL;

	if (!isset($row)) {
		display_info();
		echo '  <br><br>' . PHP_EOL;
	}

	echo '  <input type="submit" name="submit" value="Valider">' . '<br>' .
	     PHP_EOL;
}

function form_entity_registration($member_id, $row)
{
	echo '  N° d\'adhérent <sup>*</sup> : <input type="text" ' .
	     'name="member_id" value="' . $member_id . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Saison <sup>*</sup> : <input type="text" name="season" ' .
	     'value="' . $row['season'] . '"> (AAAA-AAAA)<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Formule : <input type="text" name="formula" value="' .
	     $row['formula'] . '"><br>' . PHP_EOL;
	echo '  Tarif : <input type="text" name="price" value="' .
	     $row['price'] . '"><br>' . PHP_EOL;
	echo '  Réduction : <input type="text" name="discount" value="' .
	     $row['discount'] . '"><br>' . PHP_EOL;
	echo '  Nombre de paiements : <input type="text" name="payments" ' .
	     'value="' . $row['payments'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_room($row)
{
	echo '  Nom <sup>*</sup> : <input type="text" name="name" value="' .
	     $row['name'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Adresse : <input type="text" name="adress" value="' .
	     $row['adress'] . '"><br>' . PHP_EOL;
	echo '  Code postal : <input type="text" name="postal_code" value="' .
	     $row['postal_code'] . '"><br>' . PHP_EOL;
	echo '  Ville : <input type="text" name="city" value="' . $row['city'] .
	     '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

function form_entity_teacher($row)
{
	echo '  Nom <sup>*</sup> : <input type="text" name="last_name" ' .
	     'value="' . $row['last_name'] . '"><br>' . PHP_EOL;
	echo '  Prénom <sup>*</sup> : <input type="text" name="first_name" ' .
	     'value="' . $row['first_name'] . '">' . '<br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Adresse : <input type="text" name="adress" value="' .
	     $row['adress'] . '"><br>' . PHP_EOL;
	echo '  Code postal : <input type="text" name="postal_code" value="' .
	     $row['postal_code'] . '"><br>' . PHP_EOL;
	echo '  Ville : <input type="text" name="city" value="' . $row['city'] .
	     '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;
	echo '  Portable : <input type="text" name="cellphone" value="' .
	     $row['cellphone'] . '"><br>' . PHP_EOL;
	echo '  Fixe : <input type="text" name="phone" value="' .
	     $row['phone'] . '"><br>' . PHP_EOL;
	echo '  Email : <input type="text" name="email" value="' .
	     $row['email'] . '"><br>' . PHP_EOL;
	echo '  <br>' . PHP_EOL;

	echo '  <input type="submit" name="submit" value="Valider"><br>' .
	     PHP_EOL;
}

/*
 * Helper functions for deleting entities
 */
function update_lesson($link, $lesson_id, $ref_table)
{
	$query = 'UPDATE lesson SET ' . $ref_table .
		 '_id = 0 WHERE lesson_id = ' . $lesson_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function check_dependencies_lesson($link, $ref_table, $ref_id)
{
	$query = 'SELECT lesson_id FROM lesson WHERE ' . $ref_table . '_id = ' .
		 $ref_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result))
		update_lesson($link, $row['lesson_id'], $ref_table);

	mysqli_free_result($result);
}

function check_dependencies_by_table($link, $table, $ref_table, $ref_id)
{
	$query = 'SELECT ' . $table . '_id FROM `' . $table . '` WHERE ' .
		 $ref_table . '_id = ' . $ref_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	while ($row = mysqli_fetch_assoc($result))
		delete_entity($table, $row[$table . '_id']);

	mysqli_free_result($result);
}

function check_dependencies_by_association($link, $table, $ref_table, $ref_id)
{
	$query = 'DELETE FROM `' . $table . '` WHERE ' . $ref_table . '_id = ' .
		 $ref_id;
	if (!mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}
}

function check_dependencies($link, $table, $id)
{
	switch ($table) {
	case 'goody':
		check_dependencies_by_association($link, 'contains', $table,
						  $id);
		break;
	case 'lesson':
		check_dependencies_by_association($link, 'participates', $table,
						  $id);
		break;
	case 'member':
		check_dependencies_by_table($link, 'file', $table, $id);
		check_dependencies_by_table($link, 'order', $table, $id);
		check_dependencies_by_association($link, 'participates', $table,
						  $id);
		check_dependencies_by_table($link, 'registration', $table, $id);
		break;
	case 'order':
		check_dependencies_by_association($link, 'contains', $table,
						  $id);
		break;
	case 'registration':
		check_dependencies_by_table($link, 'payment', $table, $id);
		break;
	case 'room':
		check_dependencies_lesson($link, $table, $id);
		break;
	case 'teacher':
		check_dependencies_lesson($link, $table, $id);
		break;
	}
}
?>

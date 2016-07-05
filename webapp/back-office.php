<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/libpre-registration.php';
include_once 'include/table.php';
include_once 'include/entity.php';
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Gestion INS School</title>

</head>
<body>

<h1>Gestion INS School</h1>

<nav>
  <a href="back-office.php">Accueil</a>
  <a href="back-office.php?table=member">Adhérents</a>
  <a href="back-office.php?table=order">Commandes</a>
  <a href="back-office.php?table=lesson">Cours</a>
  <a href="back-office.php?table=goody">Goodies</a>
  <a href="back-office.php?table=pre_registration">Pré-inscriptions</a>
  <a href="back-office.php?table=teacher">Professeurs</a>
  <a href="back-office.php?table=room">Salles</a>
</nav>
<br>

<?php
session_start();

if (isset($_POST['goody_sorting']))
	$_SESSION['goody_sorting'] = $_POST['goody_sorting'];
if (isset($_POST['lesson_sorting']))
	$_SESSION['lesson_sorting'] = $_POST['lesson_sorting'];
if (isset($_POST['order_sorting']))
	$_SESSION['order_sorting'] = $_POST['order_sorting'];
if (isset($_POST['person_sorting']))
	$_SESSION['person_sorting'] = $_POST['person_sorting'];
if (isset($_POST['room_sorting']))
	$_SESSION['room_sorting'] = $_POST['room_sorting'];
if (isset($_POST['limit']))
	$_SESSION['limit'] = $_POST['limit'];

$action = '';

if (isset($_POST['submit']) && $_GET['mode'] == 'modify')
	$action = 'modify_entity';
else if (isset($_POST['submit']) && $_GET['mode'] == 'add')
	$action = 'add_entity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'modify_quantity')
	$action = 'modify_quantity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'commit')
	$action = 'commit_pre_registration';
else if (isset($_GET['mode']) && $_GET['mode'] == 'delete')
	$action = 'delete_entity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'modify')
	$action = 'form_modify_entity';
else if (isset($_GET['mode']) && $_GET['mode'] == 'add')
	$action = 'form_add_entity';
else if (isset($_GET['id']))
	$action = 'display_entity';
else if (isset($_GET['table']))
	$action = 'display_table';

switch ($action) {
case 'modify_quantity':
	if (isset($_GET['quantity']))
		modify_quantity($_GET['order_id'], $_GET['goody_id'],
				$_GET['quantity']);
	else
		modify_quantity($_GET['order_id'], $_GET['goody_id'],
				$_POST['quantity']);
	break;
case 'commit_pre_registration':
	commit_pre_registration($_GET['id']);
	break;
case 'delete_entity':
	delete_entity($_GET['table'], $_GET['id']);
	display_table($_GET['table']);
	break;
case 'modify_entity':
	modify_entity($_GET['table'], $_GET['id'], $_POST);
	break;
case 'form_modify_entity':
	form_modify_entity($_GET['table'], $_GET['id']);
	break;
case 'add_entity':
	add_entity($_GET['table'], $_POST);
	break;
case 'form_add_entity':
	form_add_entity($_GET['table'], $_GET['id']);
	break;
case 'display_entity':
	display_entity($_GET['table'], $_GET['id']);
	break;
case 'display_table':
	display_table($_GET['table'], $_GET['page']);
	break;
}
?>

</body>
</html>

<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

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
$action = '';

if (isset($_POST['submit']) && $_GET['mode'] == 'modify')
	$action = 'modify_entity';
else if (isset($_POST['submit']) && $_GET['mode'] == 'add')
	$action = 'add_entity';
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
case 'delete_entity':
	delete_entity($_GET['table'], $_GET['id']);
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
	display_table($_GET['table'], $_POST['limit'], $_GET['page']);
	break;
}
?>

</body>
</html>

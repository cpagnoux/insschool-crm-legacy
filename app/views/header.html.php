<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="author" content="Christophe Pagnoux-Vieuxfort">

<title>Espace de gestion INS School</title>

<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">

</head>
<body>

<header>
  <img src="http://www.insschool.fr/wp-content/uploads/2012/08/logo-site-noir1.jpg" alt="Logo">
  <h1>Espace de gestion INS School</h1>

  <?php link_logout() ?>

  <hr>
  <nav>
    <?php link_home() ?>
    <?php link_table('lesson') ?>
    <?php link_table('teacher') ?>
    <?php link_table('room') ?>
    <?php link_table('goody') ?>
    <?php link_table('order') ?>
    <?php link_table('member') ?>
    <?php link_table('pre_registration') ?>
  </nav>
  <hr>
</header>


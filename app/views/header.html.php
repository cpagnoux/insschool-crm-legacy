<!DOCTYPE html>
<!-- vim: set et: -->
<html lang="fr">
<head>

<meta charset="utf-8">
<meta name="author" content="Christophe Pagnoux-Vieuxfort">

<title>Espace de gestion INS School</title>

<link rel="stylesheet" type="text/css" href="css/normalize.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="fonts/entypo_regular_macroman/stylesheet.css">
<link rel="stylesheet" type="text/css" href="css/entypo.css">

<script src="js/main.js"></script>

<?php if (strpos($_SERVER['SCRIPT_NAME'], 'send_mail.php') !== false): ?>
  <script src="js/ckeditor/ckeditor.js"></script>
<?php endif ?>

</head>
<body>

<header>
  <div class="utility-bar">
    <?php link_send_ticket() ?>
    <span class="blank"></span>

    <div class="dropdown">
      <span class="dropdown-toggle" id="dropdown-toggle" onclick="showMenu()">Mon compte &#9662;</span>

      <ul class="dropdown-menu" id="dropdown-menu">
        <li><?php link_change_password() ?></li>
        <li><?php link_logout() ?></li>
      </ul>
    </div>
  </div>

  <nav class="navbar">
    <a href="index.php">
      <img src="img/logo-black.jpg" alt="Logo">
    </a>

    <ul>
      <li><?php link_home() ?></li>
      <li><?php link_table('lesson') ?></li>
      <li><?php link_table('teacher') ?></li>
      <li><?php link_table('room') ?></li>
      <li><?php link_table('goody') ?></li>
      <li><?php link_table('order') ?></li>
      <li><?php link_table('member') ?></li>
      <li><?php link_table('pre_registration') ?></li>

      <?php if ($_SESSION['admin']): ?>
        <li><?php link_table('user') ?></li>
      <?php endif ?>
    </ul>
  </nav>
</header>


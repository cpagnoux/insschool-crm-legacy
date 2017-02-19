<!DOCTYPE html>
<!-- vim: set et: -->
<html lang="fr">
<head>

<meta charset="utf-8">
<meta name="author" content="Christophe Pagnoux-Vieuxfort">

<title>Espace de gestion INS School</title>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="fonts/entypo_regular_macroman/stylesheet.css">
<link rel="stylesheet" href="css/entypo.css">

</head>
<body>

<header>
  <div class="utility-bar">
    <?php link_send_ticket() ?>
    <span class="blank"></span>

    <div class="dropdown">
      <span class="dropdown-toggle" id="dropdown-toggle" onclick="toggleMenu()">Mon compte &#9662;</span>

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


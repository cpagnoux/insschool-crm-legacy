<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="author" content="Christophe Pagnoux-Vieuxfort">

<title>Espace de gestion INS School</title>

<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

<header>
  <div class="logout">
    <?php link_logout() ?>
  </div>

  <div class="navigation-bar">
    <img class="logo" src="http://www.insschool.fr/wp-content/uploads/2012/08/logo-site-noir1.jpg" alt="Logo">

    <nav>
      <ul>
        <li><?php link_home() ?></li>
        <li><?php link_table('lesson') ?></li>
        <li><?php link_table('teacher') ?></li>
        <li><?php link_table('room') ?></li>
        <li><?php link_table('goody') ?></li>
        <li><?php link_table('order') ?></li>
        <li><?php link_table('member') ?></li>
	<li><?php link_table('pre_registration') ?></li>
      </ul>
    </nav>
  </div>
</header>


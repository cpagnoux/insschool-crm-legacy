<!DOCTYPE html>
<!-- vim: set et: -->
<html lang="fr">
<head>

<meta charset="utf-8">
<meta name="author" content="Christophe Pagnoux-Vieuxfort">

<title>Bienvenue sur l'espace de gestion INS School</title>

<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="fonts/entypo_regular_macroman/stylesheet.css">
<link rel="stylesheet" href="css/entypo.css">

</head>
<body>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <div class="form-group">
      <input id="username" type="text" name="username" placeholder="Nom d'utilisateur" required autofocus>
    </div>

    <div class="form-group">
      <input id="password" type="password" name="password" placeholder="Mot de passe" required>
    </div>

    <div class="form-group">
      <input type="submit" name="submit" value="Se connecter">
    </div>
  </form>

  <?php if ($_SESSION['login-failure']): ?>
    <p class="error"><span class="entypo entypo-alert"></span> Nom d'utilisateur ou mot de passe incorrect</p>
  <?php endif ?>
</div>

<footer>
  <div class="footer-container">
    <p>&copy; 2016-2017 Christophe Pagnoux-Vieuxfort</p>
    <p>Entypo pictograms by Daniel Bruce — www.entypo.com</p>
  </div>
</footer>

</body>
</html>

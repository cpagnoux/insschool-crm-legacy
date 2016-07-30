<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="author" content="Christophe Pagnoux-Vieuxfort">

<title>Bienvenue sur l'espace de gestion INS School</title>

<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

<div class="login-container">
  <img src="http://www.insschool.fr/wp-content/uploads/2012/08/logo-site-noir1.jpg" alt="Logo">

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="form-row">
      <input id="username" type="text" name="username" placeholder="Nom d'utilisateur" required="required" autofocus="autofocus">
    </div>

    <div class="form-row">
      <input id="password" type="password" name="password" placeholder="Mot de passe" required="required">
    </div>

    <div class="form-row">
      <input type="submit" name="submit" value="Se connecter">
    </div>
  </form>
</div>

</body>
</html>

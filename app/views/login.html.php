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

<header class="login-header">
  <img class="logo" src="http://www.insschool.fr/wp-content/uploads/2012/08/logo-site-noir1.jpg" alt="Logo">
  <h1>Espace de gestion INS School</h1>
</header>

<div class="login-form">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <p>Nom d'utilisateur<br>
    <input type="text" name="username" required="required"><br>
    Mot de passe<br>
    <input type="password" name="password" required="required"></p>

    <p><input type="submit" name="submit" value="Se connecter"></p>
  </form>
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Espace de gestion INS School</title>

</head>
<body>

<header>
  <img src="http://www.insschool.fr/wp-content/uploads/2012/08/logo-site-noir1.jpg" alt="Logo">
  <h1>Espace de gestion INS School</h1>
</header>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <p>Nom d'utilisateur<br>
  <input type="text" name="username" required="required"><br>
  Mot de passe<br>
  <input type="password" name="password" required="required"></p>

  <p><input type="submit" name="submit" value="Se connecter"></p>
</form>

<footer>
  <p>Ce site utilise Normalize.css par Nicolas Gallagher</p>
</footer>

</body>
</html>

<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('user') ?></li>
  <li>Nouvel utilisateur</li>
</ol>

<div class="container">
  <p>Nouveau compte créé avec succès !</p>
  <p>Mot de passe : <?php echo $_SESSION['new_password'] ?></p>
</div>

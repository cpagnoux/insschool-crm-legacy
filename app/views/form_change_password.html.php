<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Changer de mot de passe</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=change_password" method="post">
    <fieldset>
      <div class="form-row">
        <label for="current_password">Mot de passe actuel :</label><br>
        <input id="current_password" type="password" name="current_password" value="<?php echo $current_password ?>" required="required">

        <?php if ($_SESSION['wrong_password']): ?>
          <span class="error">Mot de passe incorrect</span>
        <?php endif ?>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <label for="new_password">Nouveau mot de passe :</label><br>
        <input id="new_password" type="password" name="new_password" value="<?php echo $new_password ?>" required="required">
      </div>

      <div class="form-row">
        <label for="new_password_confirm">Confirmez le nouveau mot de passe :</label><br>
        <input id="new_password_confirm" type="password" name="new_password_confirm" value="<?php echo $new_password_confirm ?>" required="required">

        <?php if ($_SESSION['passwords_differ']): ?>
          <span class="error">Les mots de passe sont différents</span>
        <?php endif ?>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

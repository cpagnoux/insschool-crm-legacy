<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Changer de mot de passe</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=change_password" method="post">
    <fieldset>
      <div class="form-group">
        <label for="current_password">Mot de passe actuel</label>
        <input id="current_password" type="password" name="current_password" value="<?php echo $current_password ?>" required autofocus>
        <span></span>

        <?php if ($_SESSION['wrong_password']): ?>
          <span class="error">Mot de passe incorrect</span>
        <?php endif ?>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <label for="new_password">Nouveau mot de passe</label>
        <input id="new_password" type="password" name="new_password" value="<?php echo $new_password ?>" required>
        <span></span>
      </div>

      <div class="form-group">
        <label for="new_password_confirm">Confirmez le nouveau mot de passe</label>
        <input id="new_password_confirm" type="password" name="new_password_confirm" value="<?php echo $new_password_confirm ?>" required>
        <span></span>

        <?php if ($_SESSION['passwords_differ']): ?>
          <span class="error">Les mots de passe sont différents</span>
        <?php endif ?>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

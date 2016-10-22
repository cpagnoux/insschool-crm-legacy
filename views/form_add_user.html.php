<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('user') ?></li>
  <li>Nouvel utilisateur</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=user" method="post">
    <fieldset>
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input id="username" type="text" name="username" <?php regexp_username() ?> required autofocus>
        <span>Entre 4 et 24 caractères, ne doit contenir que des lettres, des chiffres, &quot;_&quot; et &quot;-&quot;.</span>
      </div>

      <div class="form-group">
        Administrateur<br>

        <div class="form-group-option">
          <input id="admin_true" type="radio" name="admin" value="1" required>
          <label for="admin_true">Oui</label>
        </div>

        <div class="form-group-option">
          <input id="admin_false" type="radio" name="admin" value="0">
          <label for="admin_false">Non</label>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

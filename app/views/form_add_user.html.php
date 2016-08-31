<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('user') ?></li>
  <li>Nouvel utilisateur</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=user" method="post">
    <fieldset>
      <div class="form-row">
        <label for="username">Nom d'utilisateur : <sup>*</sup></label><br>
        <input id="username" type="text" name="username" required>
      </div>

      <div class="form-row">
        Administrateur : <sup>*</sup><br>

        <div class="form-row-option">
          <input id="admin_true" type="radio" name="admin" value="1" required>
          <label for="admin_true">Oui</label>
        </div>

        <div class="form-row-option">
          <input id="admin_false" type="radio" name="admin" value="0">
          <label for="admin_false">Non</label>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

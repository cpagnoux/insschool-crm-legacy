<!-- vim: set et: -->

<fieldset>
  <div class="form-group">
    <label for="last_name">Nom</label>
    <input id="last_name" type="text" name="last_name" value="<?php echo $row['last_name'] ?>" required autofocus>
    <span></span>
  </div>

  <div class="form-group">
    <label for="first_name">Prénom</label>
    <input id="first_name" type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required>
    <span></span>
  </div>

  <?php select_date('Date de naissance', 'bd', false, $row['birth_date']) ?>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="address">Adresse</label>
    <input id="address" type="text" name="address" value="<?php echo $row['address'] ?>">
    <span></span>
  </div>

  <div class="form-group">
    <label for="postal_code">Code postal</label>
    <input id="postal_code" type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>" <?php regexp_postal_code() ?>>
    <span></span>
  </div>

  <div class="form-group">
    <label for="city">Ville</label>
    <input id="city" type="text" name="city" value="<?php echo $row['city'] ?>">
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="cellphone">Portable</label>
    <input id="cellphone" type="text" name="cellphone" value="<?php echo reverse_format_phone_number($row['cellphone']) ?>" <?php regexp_phone_number() ?>>
    <span></span>
  </div>

  <div class="form-group">
    <label for="phone">Fixe</label>
    <input id="phone" type="text" name="phone" value="<?php echo reverse_format_phone_number($row['phone']) ?>" <?php regexp_phone_number() ?>>
    <span></span>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="<?php echo $row['email'] ?>" <?php regexp_email() ?>>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

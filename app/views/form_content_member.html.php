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

  <?php select_date('Date de naissance', 'bd', true, $row['birth_date']) ?>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="address">Adresse</label>
    <input id="address" type="text" name="address" value="<?php echo $row['address'] ?>" required>
    <span></span>
  </div>

  <div class="form-group">
    <label for="postal_code">Code postal</label>
    <input id="postal_code" type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>" required>
    <span></span>
  </div>

  <div class="form-group">
    <label for="city">Ville</label>
    <input id="city" type="text" name="city" value="<?php echo $row['city'] ?>" required>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="cellphone">Portable</label>
    <input id="cellphone" type="text" name="cellphone" value="<?php echo $row['cellphone'] ?>">
    <span></span>
  </div>

  <div class="form-group">
    <label for="cellphone_father">Portable père</label>
    <input id="cellphone_father" type="text" name="cellphone_father" value="<?php echo $row['cellphone_father'] ?>">
    <span></span>
  </div>

  <div class="form-group">
    <label for="cellphone_mother">Portable mère</label>
    <input id="cellphone_mother" type="text" name="cellphone_mother" value="<?php echo $row['cellphone_mother'] ?>">
    <span></span>
  </div>

  <div class="form-group">
    <label for="phone">Fixe</label>
    <input id="phone" type="text" name="phone" value="<?php echo $row['phone'] ?>">
    <span></span>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="<?php echo $row['email'] ?>">
    <span></span>
  </div>
</fieldset>

<fieldset>
  <?php radio_means_of_knowledge(false, $row['means_of_knowledge']) ?>
</fieldset>

<fieldset>
  <div class="form-group">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="last_name">Nom <sup>*</sup> :</label><br>
    <input id="last_name" type="text" name="last_name" value="<?php echo $row['last_name'] ?>" required="required">
  </div>

  <div class="form-row">
    <label for="first_name">Prénom <sup>*</sup> :</label><br>
    <input id="first_name" type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required="required">
  </div>

  <div class="form-row">
    <label for="birth_date">Date de naissance :</label><br>
    <input id="birth_date" type="text" name="birth_date" value="<?php echo $row['birth_date'] ?>">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="address">Adresse :</label><br>
    <input id="address" type="text" name="address" value="<?php echo $row['address'] ?>">
  </div>

  <div class="form-row">
    <label for="postal_code">Code postal :</label><br>
    <input id="postal_code" type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>">
  </div>

  <div class="form-row">
    <label for="city">Ville :</label><br>
    <input id="city" type="text" name="city" value="<?php echo $row['city'] ?>">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="cellphone">Portable :</label><br>
    <input id="cellphone" type="text" name="cellphone" value="<?php echo $row['cellphone'] ?>">
  </div>

  <div class="form-row">
    <label for="phone">Fixe :</label><br>
    <input id="phone" type="text" name="phone" value="<?php echo $row['phone'] ?>">
  </div>

  <div class="form-row">
    <label for="email">Email :</label><br>
    <input id="email" type="email" name="email" value="<?php echo $row['email'] ?>">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="name">Nom</label><br>
    <input id="name" type="text" name="name" value="<?php echo $row['name'] ?>" required>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="address">Adresse</label><br>
    <input id="address" type="text" name="address" value="<?php echo $row['address'] ?>">
    <span></span>
  </div>

  <div class="form-row">
    <label for="postal_code">Code postal</label><br>
    <input id="postal_code" type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>">
    <span></span>
  </div>

  <div class="form-row">
    <label for="city">Ville</label><br>
    <input id="city" type="text" name="city" value="<?php echo $row['city'] ?>">
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

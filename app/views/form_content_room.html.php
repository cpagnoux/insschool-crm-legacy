<fieldset>
  <div class="form-group">
    <label for="name">Nom</label>
    <input id="name" type="text" name="name" value="<?php echo $row['name'] ?>" required autofocus>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="address">Adresse</label>
    <input id="address" type="text" name="address" value="<?php echo $row['address'] ?>">
    <span></span>
  </div>

  <div class="form-group">
    <label for="postal_code">Code postal</label>
    <input id="postal_code" type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>">
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
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

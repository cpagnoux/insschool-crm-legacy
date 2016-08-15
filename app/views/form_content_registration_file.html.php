<fieldset>
  <div class="form-row">
    <label for="registration_id">N° d'inscription :</label><br>
    <input id="registration_id" type="text" name="registration_id" value="<?php echo $registration_id ?>" readonly="readonly">
  </div>
</fieldset>

<fieldset>
  <?php radio_medical_certificate($row['medical_certificate']) ?>
  <?php radio_insurance($row['insurance']) ?>
  <?php radio_photo($row['photo']) ?>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

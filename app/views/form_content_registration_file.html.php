<fieldset>
  <div class="form-row">
    <label for="registration_id">N° d'inscription :</label><br>
    <input id="registration_id" type="text" name="registration_id" value="<?php echo $registration_id ?>" readonly="readonly">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    Certificat médical <sup>*</sup> :<br>

    <div class="form-row-option">
      <input id="medical_certificate_true" type="radio" name="medical_certificate" value="1" required="required"<?php echo $medical_certificate_true ?>>
      <label for="medical_certificate_true">Oui</label>
    </div>

    <div class="form-row-option">
      <input id="medical_certificate_false" type="radio" name="medical_certificate" value="0"<?php echo $medical_certificate_false ?>>
      <label for="medical_certificate_false">Non</label>
    </div>
  </div>

  <div class="form-row">
    Assurance <sup>*</sup> :<br>

    <div class="form-row-option">
      <input id="insurance_true" type="radio" name="insurance" value="1" required="required"<?php echo $insurance_true ?>>
      <label for="insurance_true">Oui</label>
    </div>

    <div class="form-row-option">
      <input id="insurance_false" type="radio" name="insurance" value="0"<?php echo $insurance_false ?>>
      <label for="insurance_false">Non</label>
    </div>
  </div>

  <div class="form-row">
    Photo <sup>*</sup> :<br>

    <div class="form-row-option">
      <input id="photo_true" type="radio" name="photo" value="1" required="required"<?php echo $photo_true ?>>
      <label for="photo_true">Oui</label>
    </div>

    <div class="form-row-option">
      <input id="photo_false" type="radio" name="photo" value="0"<?php echo $photo_false ?>>
      <label for="photo_false">Non</label>
    </div>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

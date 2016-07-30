<fieldset>
  <div class="form-row">
    <label for="registration_id">N° d'inscription :</label><br>
    <input id="registration_id" type="text" name="registration_id" value="<?php echo $registration_id ?>" readonly="readonly">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    Certificat médical <sup>*</sup> :<br>
    <input id="medical_certificate_true" type="radio" name="medical_certificate" value="1" required="required"<?php echo $medical_certificate_true ?>>
    <label class="label-radio" for="medical_certificate_true">Oui</label>
    <input id="medical_certificate_false" type="radio" name="medical_certificate" value="0"<?php echo $medical_certificate_false ?>>
    <label class="label-radio" for="medical_certificate_false">Non</label>
  </div>

  <div class="form-row">
    Assurance <sup>*</sup> :<br>
    <input id="insurance_true" type="radio" name="insurance" value="1" required="required"<?php echo $insurance_true ?>>
    <label class="label-radio" for="insurance_true">Oui</label>
    <input id="insurance_false" type="radio" name="insurance" value="0"<?php echo $insurance_false ?>>
    <label class="label-radio" for="insurance_false">Non</label>
  </div>

  <div class="form-row">
    Photo <sup>*</sup> :<br>
    <input id="photo_true" type="radio" name="photo" value="1" required="required"<?php echo $photo_true ?>>
    <label class="label-radio" for="photo_true">Oui</label>
    <input id="photo_false" type="radio" name="photo" value="0"<?php echo $photo_false ?>>
    <label class="label-radio" for="photo_false">Non</label>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

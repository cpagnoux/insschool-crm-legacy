<p>N° d'inscription : <input type="text" name="registration_id" value="<?php echo $registration_id ?>" readonly="readonly"></p>

<p>Certificat médical <sup>*</sup> : <input type="radio" name="medical_certificate" value="1" required="required"<?php echo $medical_certificate_true ?>> Oui <input type="radio" name="medical_certificate" value="0"<?php echo $medical_certificate_false ?>> Non<br>
Assurance <sup>*</sup> : <input type="radio" name="insurance" value="1" required="required"<?php echo $insurance_true ?>> Oui <input type="radio" name="insurance" value="0"<?php echo $insurance_false ?>> Non<br>
Photo <sup>*</sup> : <input type="radio" name="photo" value="1" required="required"<?php echo $photo_true ?>> Oui <input type="radio" name="photo" value="0"<?php echo $photo_false ?>> Non</p>

<p><input type="submit" name="submit" value="Valider"></p>

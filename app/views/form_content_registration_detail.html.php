<fieldset>
  <div class="form-row">
    <label for="registration_id">N° d'inscription :</label><br>
    <input id="registration_id" type="text" name="registration_id" value="<?php echo $registration_id ?>" readonly="readonly">
  </div>
</fieldset>

<fieldset>
  <?php select_lesson() ?>

  <div class="form-row">
    Participation à l'INS Show <sup>*</sup> :<br>
    <input id="show_participation_true" type="radio" name="show_participation" value="1" required="required">
    <label class="label-radio" for="show_participation_true">Oui</label>
    <input id="show_participation_false" type="radio" name="show_participation" value="0">
    <label class="label-radio" for="show_participation_false">Non</label>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

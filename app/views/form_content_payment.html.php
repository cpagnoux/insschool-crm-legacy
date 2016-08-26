<?php switch ($table): ?>
<?php case 'order_payment': ?>
  <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
  <?php break ?>
<?php case 'registration_payment': ?>
  <input type="hidden" name="registration_id" value="<?php echo $registration_id ?>">
  <?php break ?>
<?php endswitch ?>

<fieldset>
  <div class="form-row">
    <label for="amount">Montant <sup>*</sup> :</label><br>
    <input id="amount" type="text" name="amount" value="<?php echo $row['amount'] ?>" required="required"> €
  </div>

  <?php radio_mode($row['mode']) ?>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

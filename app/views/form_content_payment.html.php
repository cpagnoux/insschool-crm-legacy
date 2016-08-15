<fieldset>
  <div class="form-row">

<?php switch ($table): ?>
<?php case 'order_payment': ?>
  <label for="order_id">N° de commande :</label><br>
  <input id="order_id" type="text" name="order_id" value="<?php echo $order_id ?>" readonly="readonly">
  <?php break ?>
<?php case 'registration_payment': ?>
  <label for="registration_id">N° d'inscription :</label><br>
  <input id="registration_id" type="text" name="registration_id" value="<?php echo $registration_id ?>" readonly="readonly">
  <?php break ?>
<?php endswitch ?>

  </div>
</fieldset>

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

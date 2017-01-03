<!-- vim: set et: -->

<?php switch ($table): ?>
<?php case 'order_payment': ?>
  <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
  <?php break ?>
<?php case 'registration_payment': ?>
  <input type="hidden" name="registration_id" value="<?php echo $registration_id ?>">
  <?php break ?>
<?php endswitch ?>

<fieldset>
  <div class="form-group">
    <label for="amount">Montant</label>
    <input id="amount" type="text" name="amount" value="<?php echo $row['amount'] ?>" <?php regexp_decimal(3) ?> required autofocus> €
    <span></span>
  </div>

  <?php radio_mode($row['mode']) ?>
</fieldset>

<fieldset>
  <?php select_date('Date d\'encaissement', 'cd', true, $row['cashing_date']) ?>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="comment">Commentaire</label>
    <textarea id="comment" name="comment"><?php echo $row['comment'] ?></textarea>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

<?php switch ($table): ?>
<?php case 'order_payment': ?>
  <p>N° de commande : <input type="text" name="order_id" value="<?php echo $id ?>" readonly="readonly"></p>
  <?php break ?>
<?php case 'registration_payment': ?>
  <p>N° d'inscription : <input type="text" name="registration_id" value="<?php echo $id ?>" readonly="readonly"></p>
  <?php break ?>
<?php endswitch ?>


<p>Montant <sup>*</sup> : <input type="text" name="amount" value="<?php echo $row['amount'] ?>" required="required"> €<br>
<?php select_mode($row['mode']) ?></p>

<p><input type="submit" name="submit" value="Valider"></p>

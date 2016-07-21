<?php switch ($table): ?>
<?php case 'order': ?>
  <p>N° de commande :
  <?php break ?>
<?php case 'registration': ?>
  <p>N° d'inscription :
  <?php break ?>
<?php endswitch ?>
<input type="text" name="<?php echo $table ?>_id" value="<?php echo $id ?>" readonly="readonly"></p>

<p>Montant <sup>*</sup> : <input type="text" name="amount" value="<?php echo $row['amount'] ?>" required="required"> €<br>
<?php select_mode($row['mode']) ?></p>

<p><input type="submit" name="submit" value="Valider"></p>

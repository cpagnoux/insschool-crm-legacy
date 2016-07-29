<p>N° d'adhérent : <input type="text" name="member_id" value="<?php echo $member_id ?>" readonly="readonly"></p>

<?php if (!isset($row)): ?>
  <p><?php require 'views/select_season.html.php' ?></p>
<?php endif ?>

<p>Tarif : <input type="text" name="price" value="<?php echo $row['price'] ?>"> €<br>
Réduction : <input type="text" name="discount" value="<?php echo $row['discount'] ?>"> %<br>
Nombre de paiements : <input type="text" name="num_payments" value="<?php $row['num_payments'] ?>"></p>

<p><input type="submit" name="submit" value="Valider"></p>

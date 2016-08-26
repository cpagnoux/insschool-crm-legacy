<input type="hidden" name="member_id" value="<?php echo $member_id ?>">

<?php if (!isset($row)): ?>
  <fieldset>
    <?php require 'views/select_season.html.php' ?>
  </fieldset>
<?php endif ?>

<fieldset>
  <?php radio_plan($row['plan']) ?>

  <div class="form-row">
    <label for="price">Tarif :</label><br>
    <input id="price" type="text" name="price" value="<?php echo $row['price'] ?>"> €
  </div>

  <div class="form-row">
    <label for="discount">Réduction :</label><br>
    <input id="discount" type="text" name="discount" value="<?php echo $row['discount'] ?>"> %
  </div>

  <div class="form-row">
    <label for="num_payments">Nombre de paiements :</label><br>
    <input id="num_payments" type="text" name="num_payments" value="<?php $row['num_payments'] ?>">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

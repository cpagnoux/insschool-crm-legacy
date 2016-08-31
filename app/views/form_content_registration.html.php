<input type="hidden" name="member_id" value="<?php echo $member_id ?>">

<?php if (!isset($row)): ?>
  <fieldset>
    <?php require 'views/select_season.html.php' ?>
  </fieldset>
<?php endif ?>

<fieldset>
  <?php radio_plan($row['plan']) ?>
  <?php checkbox_followed_quarters($row['plan'], $row['followed_quarters']) ?>

  <div class="form-group">
    <label for="price">Tarif</label>
    <input id="price" type="text" name="price" value="<?php echo $row['price'] ?>"> €
    <span></span>
  </div>

  <div class="form-group">
    <label for="discount">Réduction</label>
    <input id="discount" type="text" name="discount" value="<?php echo $row['discount'] ?>"> %
    <span></span>
  </div>

  <div class="form-group">
    <label for="num_payments">Nombre de paiements</label>
    <input id="num_payments" type="text" name="num_payments" value="<?php $row['num_payments'] ?>">
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

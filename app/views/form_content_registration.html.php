<fieldset>
  <div class="form-row">
    <label for="member_id">N° d'adhérent :</label><br>
    <input id="member_id" type="text" name="member_id" value="<?php echo $member_id ?>" readonly="readonly">
  </div>
</fieldset>

<?php if (!isset($row)): ?>
  <fieldset>
    <?php require 'views/select_season.html.php' ?>
  </fieldset>
<?php endif ?>

<fieldset>
  <div class="form-row">
    Forfait : <sup>*</sup><br>

    <div class="form-row-option">
      <input id="p_quarterly" type="radio" name="plan" value="QUARTERLY" required="required"<?php echo $p_quarterly ?>>
      <label for="p_quarterly">Trimestriel</label>
    </div>

    <div class="form-row-option">
      <input id="p_annual" type="radio" name="plan" value="ANNUAL"<?php echo $p_annual ?>>
      <label for="p_annual">Annuel</label>
    </div>
  </div>

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

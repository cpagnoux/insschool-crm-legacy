<!-- vim: set et: -->

<input type="hidden" name="member_id" value="<?php echo $member_id ?>">

<?php if (!isset($row)): ?>
  <fieldset>
    <?php select_season() ?>
  </fieldset>
<?php endif ?>

<fieldset>
  <?php radio_plan($row['plan']) ?>
  <?php checkbox_followed_quarters($row['plan'], $row['followed_quarters']) ?>

  <div class="form-group">
    <label for="price">Tarif</label>
    <input id="price" type="text" name="price" value="<?php echo $row['price'] ?>" <?php regexp_decimal(3) ?>> €
    <span></span>
  </div>

  <div class="form-group">
    <label for="discount">Réduction</label>
    <input id="discount" type="number" name="discount" value="<?php echo $row['discount'] ?>" min="0" max="100"> %
    <span></span>
  </div>

  <div class="form-group">
    <label for="num_payments">Nombre de paiements</label>
    <input id="num_payments" type="number" name="num_payments" value="<?php echo $row['num_payments'] ?>" min="1" max="9">
    <span></span>
  </div>
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

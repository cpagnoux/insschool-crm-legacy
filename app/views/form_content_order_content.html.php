<fieldset>
  <div class="form-row">
    <label for="order_id">N° de commande :</label><br>
    <input id="order_id" type="text" name="order_id" value="<?php echo $order_id ?>" readonly="readonly">
  </div>
</fieldset>

<fieldset>
  <?php select_goody() ?>

  <div class="form-row">
    <label for="quantity">Quantité <sup>*</sup> :</label><br>
    <input id="quantity" type="text" name="quantity" required="required">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

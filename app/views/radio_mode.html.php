<div class="form-row">
  Mode de paiement <sup>*</sup> :<br>

  <div class="form-row-option">
    <input id="cash" type="radio" name="mode" value="CASH" required="required"<?php echo $cash ?>>
    <label for="cash">Espèces</label>
  </div>

  <div class="form-row-option">
    <input id="check" type="radio" name="mode" value="CHECK"<?php echo $check ?>>
    <label for="check">Chèque</label>
  </div>
</div>

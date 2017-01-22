<!-- vim: set et: -->

<div class="form-group">
  Mode de paiement<br>

  <div class="form-group-option">
    <input id="cash" type="radio" name="mode" value="CASH" required<?php echo $cash ?>>
    <label for="cash">Espèces</label>
  </div>

  <div class="form-group-option">
    <input id="check" type="radio" name="mode" value="CHECK"<?php echo $check ?>>
    <label for="check">Chèque</label>
  </div>
</div>

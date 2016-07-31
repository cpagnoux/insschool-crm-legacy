<div class="form-row">
  <label for="mode">Mode de paiement <sup>*</sup> :</label><br>

  <select id="mode" name="mode" required="required">
    <option value="">Sélectionner</option>
    <option value="CASH"<?php echo $mode_cash ?>>Espèces</option>
    <option value="CHECK"<?php echo $mode_check ?>>Chèque</option>
  </select>
</div>

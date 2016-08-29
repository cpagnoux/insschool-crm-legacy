<div class="form-row">
  Forfait <sup>*</sup> :<br>

  <div class="form-row-option">
    <input id="quarterly" type="radio" name="plan" value="QUARTERLY" required="required"<?php echo $quarterly ?> onclick="showContent()">
    <label for="quarterly" onclick="showContent()">Trimestriel</label>
  </div>

  <div class="form-row-option">
    <input id="annual" type="radio" name="plan" value="ANNUAL"<?php echo $annual ?> onclick="hideContent()">
    <label for="annual" onclick="hideContent()">Annuel</label>
  </div>
</div>

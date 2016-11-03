<!-- vim: set expandtab: -->

<div class="form-group">
  Forfait<br>

  <div class="form-group-option">
    <input id="quarterly" type="radio" name="plan" value="QUARTERLY"<?php echo $quarterly ?> onclick="showContent('followed_quarters')">
    <label for="quarterly" onclick="showContent('followed_quarters')">Trimestriel</label>
  </div>

  <div class="form-group-option">
    <input id="annual" type="radio" name="plan" value="ANNUAL"<?php echo $annual ?> onclick="hideContent('followed_quarters')">
    <label for="annual" onclick="hideContent('followed_quarters')">Annuel</label>
  </div>
</div>

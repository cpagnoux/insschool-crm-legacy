<div class="form-row">
  <label for="season">Saison <sup>*</sup> :</label><br>
  <select id="season" name="season" required="required">
    <option value="<?php echo previous_season() ?>"><?php echo previous_season() ?></option>
    <option value="<?php echo current_season() ?>" selected="selected"><?php echo current_season() ?></option>
  </select>
</div>

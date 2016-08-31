<div class="form-group">
  <label for="season">Saison</label>

  <select id="season" name="season" required>
    <option value="<?php echo current_season() ?>" selected="selected"><?php echo current_season() ?></option>
    <option value="<?php echo previous_season() ?>"><?php echo previous_season() ?></option>
  </select>
</div>

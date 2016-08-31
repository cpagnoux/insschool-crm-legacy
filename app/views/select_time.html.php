<div class="form-row">
  <label for="<?php echo $prefix ?>_hour"><?php echo $label ?> <sup>*</sup> :</label><br>

  <select class="datetime-select" id="<?php echo $prefix ?>_hour" name="<?php echo $prefix ?>_hour" required>
    <option value="">Heures</option>

    <?php for ($i = 0; $i < 24; $i++): ?>
      <?php if (isset($hour) && $i == $hour): ?>
        <option value="<?php echo $i ?>" selected="selected"><?php echo $i ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>

  h

  <select class="datetime-select" name="<?php echo $prefix ?>_minute" required>
    <option value="">Minutes</option>

    <?php for ($i = 0; $i < 60; $i++): ?>
      <?php if (isset($minute) && $i == $minute): ?>
        <option value="<?php echo $i ?>" selected="selected"><?php echo sprintf('%02d', $i) ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo sprintf('%02d', $i) ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>
</div>

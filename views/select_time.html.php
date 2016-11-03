<!-- vim: set expandtab: -->

<div class="form-group">
  <label for="<?php echo $prefix ?>_hour"><?php echo $label ?></label>

  <select class="datetime-select" id="<?php echo $prefix ?>_hour" name="<?php echo $prefix ?>_hour">
    <option value="">Heures</option>

    <?php for ($i = 0; $i < 24; $i++): ?>
      <?php if (isset($hour) && $i == $hour): ?>
        <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>

  h

  <select class="datetime-select" name="<?php echo $prefix ?>_minute">
    <option value="">Minutes</option>

    <?php for ($i = 0; $i < 60; $i += 5): ?>
      <?php if (isset($minute) && $i == $minute): ?>
        <option value="<?php echo $i ?>" selected><?php echo sprintf('%02d', $i) ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo sprintf('%02d', $i) ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>

  <span></span>
</div>

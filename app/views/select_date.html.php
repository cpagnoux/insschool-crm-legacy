<div class="form-row">
  <label for="<?php echo $prefix ?>_day"><?php echo $label ?></label><br>

  <select class="datetime-select" id="<?php echo $prefix ?>_day" name="<?php echo $prefix ?>_day"<?php echo $required_attribute ?>>
    <option value="">Jour</option>

    <?php for ($i = 1; $i <= 31; $i++): ?>
      <?php if (isset($day) && $i == $day): ?>
        <option value="<?php echo $i ?>" selected="selected"><?php echo $i ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>

  <select class="datetime-select" name="<?php echo $prefix ?>_month"<?php echo $required_attribute ?>>
    <option value="">Mois</option>

    <?php for ($i = 1; $i <= 12; $i++): ?>
      <?php if (isset($month) && $i == $month): ?>
        <option value="<?php echo $i ?>" selected="selected"><?php echo $months[$i] ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo $months[$i] ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>

  <select class="datetime-select" name="<?php echo $prefix ?>_year"<?php echo $required_attribute ?>>
    <option value="">Année</option>

    <?php for ($i = date('Y') - 6; $i >= date('Y') - 100; $i--): ?>
      <?php if (isset($year) && $i == $year): ?>
        <option value="<?php echo $i ?>" selected="selected"><?php echo $i ?></option>
      <?php else: ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
      <?php endif ?>
    <?php endfor ?>
  </select>

  <span></span>
</div>

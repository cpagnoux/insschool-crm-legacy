<fieldset>
  <div class="form-row">
    <label for="title">Intitulé <sup>*</sup> :</label><br>
    <input id="title" type="text" name="title" value="<?php echo $row['title'] ?>" required="required">
  </div>
</fieldset>

<fieldset>
  <?php select_teacher($row['teacher_id']) ?>
</fieldset>

<fieldset>
  <?php select_day($row['day']) ?>

  <div class="form-row">
    <label for="start_time">Heure de début <sup>*</sup> :</label><br>
    <input id="start_time" type="text" name="start_time" value="<?php echo $row['start_time'] ?>" required="required"> (HH:MM:SS)
  </div>

  <div class="form-row">
    <label for="end_time">Heure de fin <sup>*</sup> :</label><br>
    <input id="end_time" type="text" name="end_time" value="<?php echo $row['end_time'] ?>" required="required"> (HH:MM:SS)
  </div>

  <?php select_room($row['room_id']) ?>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="costume">Costume :</label><br>
    <textarea id="costume" name="costume"><?php echo $row['costume'] ?></textarea>
  </div>

  <div class="form-row">
    <label for="t_shirt">T-shirt :</label><br>
    <textarea id="t_shirt" name="t_shirt"><?php echo $row['t_shirt'] ?></textarea>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

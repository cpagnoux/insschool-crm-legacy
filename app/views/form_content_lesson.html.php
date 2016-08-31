<fieldset>
  <div class="form-row">
    <label for="title">Intitulé</label><br>
    <input id="title" type="text" name="title" value="<?php echo $row['title'] ?>" required>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <?php select_teacher($row['teacher_id']) ?>
</fieldset>

<fieldset>
  <?php select_day($row['day']) ?>
  <?php select_time('Heure de début', 'st', $row['start_time']) ?>
  <?php select_time('Heure de fin', 'et', $row['end_time']) ?>
  <?php select_room($row['room_id']) ?>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="costume">Costume</label><br>
    <textarea id="costume" name="costume"><?php echo $row['costume'] ?></textarea>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

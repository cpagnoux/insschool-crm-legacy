<div class="form-row">
  <label for="teacher_id">Professeur <sup>*</sup> :</label><br>
  <select id="teacher_id" name="teacher_id" required="required">
    <option value=""></option>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php if ($row['teacher_id'] == $teacher_id): ?>
        <option value="<?php echo $row['teacher_id'] ?>" selected="selected"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
      <?php else: ?>
        <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
      <?php endif ?>
    <?php endwhile ?>
  </select>
</div>

Professeur <sup>*</sup> :
<select name="teacher_id" required="required">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <?php if ($row['teacher_id'] == $teacher_id): ?>
      <option value="<?php echo $row['teacher_id'] ?>" selected="selected"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
    <?php else: ?>
      <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
    <?php endif ?>
  <?php endwhile ?>
</select>
<br>

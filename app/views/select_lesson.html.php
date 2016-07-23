Cours <sup>*</sup> :
<select name="lesson_id" required="required">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <option value="<?php echo $row['lesson_id'] ?>"><?php echo $row['title'] ?></option>
  <?php endwhile ?>
</select>
<br>

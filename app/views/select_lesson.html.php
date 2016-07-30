<div class="form-row">
  <label for="lesson_id">Cours <sup>*</sup> :</label><br>
  <select id="lesson_id" name="lesson_id" required="required">
    <option value=""></option>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <option value="<?php echo $row['lesson_id'] ?>"><?php echo $row['title'] ?></option>
    <?php endwhile ?>
  </select>
</div>

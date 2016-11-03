<!-- vim: set expandtab: -->

<div class="form-group">
  <label for="lesson_id">Cours</label>

  <select id="lesson_id" name="lesson_id" required>
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php $row = html_encode_strings($row) ?>
      <option value="<?php echo $row['lesson_id'] ?>"><?php echo $row['title'] ?></option>
    <?php endwhile ?>
  </select>

  <span></span>
</div>

<div class="form-row">
  <label for="goody_id">Article</label><br>

  <select id="goody_id" name="goody_id" required>
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php $row = html_encode_strings($row) ?>
      <option value="<?php echo $row['goody_id'] ?>"><?php echo $row['name'] ?></option>
    <?php endwhile ?>
  </select>

  <span></span>
</div>

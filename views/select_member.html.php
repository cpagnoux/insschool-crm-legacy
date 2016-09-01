<div class="form-group">
  <label for="member_id">Adhérent</label>

  <select id="member_id" name="member_id" required>
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php $row = html_encode_strings($row) ?>
      <option value="<?php echo $row['member_id'] ?>"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
    <?php endwhile ?>
  </select>

  <span></span>
</div>

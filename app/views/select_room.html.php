<div class="form-row">
  <label for="room_id">Salle <sup>*</sup> :</label><br>

  <select id="room_id" name="room_id" required>
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php $row = html_encode_strings($row) ?>

      <?php if ($row['room_id'] == $room_id): ?>
        <option value="<?php echo $row['room_id'] ?>" selected="selected"><?php echo $row['name'] ?></option>
      <?php else: ?>
        <option value="<?php echo $row['room_id'] ?>"><?php echo $row['name'] ?></option>
      <?php endif ?>
    <?php endwhile ?>
  </select>
</div>

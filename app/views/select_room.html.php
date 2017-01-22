<!-- vim: set et: -->

<div class="form-group">
  <label for="room_id">Salle</label>

  <select id="room_id" name="room_id">
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php $row = html_encode_strings($row) ?>

      <?php if ($row['room_id'] == $room_id): ?>
        <option value="<?php echo $row['room_id'] ?>" selected><?php echo $row['name'] ?></option>
      <?php else: ?>
        <option value="<?php echo $row['room_id'] ?>"><?php echo $row['name'] ?></option>
      <?php endif ?>
    <?php endwhile ?>
  </select>

  <span></span>
</div>

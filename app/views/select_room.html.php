Salle <sup>*</sup> :
<select name="room_id" required="required">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <?php if ($row['room_id'] == $room_id): ?>
      <option value="<?php echo $row['room_id'] ?>" selected="selected"><?php echo $row['name'] ?></option>
    <?php else: ?>
      <option value="<?php echo $row['room_id'] ?>"><?php echo $row['name'] ?></option>
    <?php endif ?>
  <?php endwhile ?>
</select>
<br>

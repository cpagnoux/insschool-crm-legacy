Adhérent <sup>*</sup> :
<select name="member_id" required="required">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <?php if ($row['member_id'] == $member_id): ?>
      <option value="<?php echo $row['member_id'] ?>" selected="selected"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
    <?php else: ?>
      <option value="<?php echo $row['member_id'] ?>"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
    <?php endif ?>
  <?php endwhile ?>
</select>
<br>

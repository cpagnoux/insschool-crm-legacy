<div class="form-row">
  <label for="member_id">Adhérent <sup>*</sup> :</label><br>

  <select id="member_id" name="member_id" required="required">
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php if ($row['member_id'] == $member_id): ?>
        <option value="<?php echo $row['member_id'] ?>" selected="selected"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
      <?php else: ?>
        <option value="<?php echo $row['member_id'] ?>"><?php echo $row['last_name'] ?> <?php echo $row['first_name'] ?></option>
      <?php endif ?>
    <?php endwhile ?>

  </select>
</div>

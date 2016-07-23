Article <sup>*</sup> :
<select name="goody_id" required="required">
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <option value="<?php echo $row['goody_id'] ?>"><?php echo $row['name'] ?></option>
  <?php endwhile ?>
</select>
<br>

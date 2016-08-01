<div class="form-row">
  <label for="goody_id">Article <sup>*</sup> :</label><br>

  <select id="goody_id" name="goody_id" required="required">
    <option value="">Sélectionner</option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <option value="<?php echo $row['goody_id'] ?>"><?php echo $row['name'] ?></option>
    <?php endwhile ?>
  </select>
</div>

<!-- vim: set et: -->

<div class="form-group">
  <label for="season">Saison</label>

  <select id="season" name="season" required<?php echo $onchange ?>>
    <option value="<?php echo current_season() ?>"><?php echo current_season() ?></option>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php if ($row['season'] == current_season()): ?>
        <?php continue ?>
      <?php endif ?>

      <?php $row = html_encode_strings($row) ?>

      <?php if ($row['season'] == $season): ?>
        <option value="<?php echo $row['season'] ?>" selected><?php echo $row['season'] ?></option>
      <?php else: ?>
        <option value="<?php echo $row['season'] ?>"><?php echo $row['season'] ?></option>
      <?php endif ?>
    <?php endwhile ?>
  </select>
</div>

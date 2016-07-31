<div class="display-option">
  <label for="limit">Lignes par page :</label>

  <select id="limit" name="limit" onchange="this.form.submit()">
    <option value="25"<?php echo $limit_25 ?>>25</option>
    <option value="50"<?php echo $limit_50 ?>>50</option>
    <option value="100"<?php echo $limit_100 ?>>100</option>
  </select>
</div>

<!-- vim: set et: -->

<div class="display-option">
  <label for="limit">Lignes par page :</label>

  <select id="limit" name="limit" onchange="this.form.submit()">
    <option value="25"<?php echo $_25 ?>>25</option>
    <option value="50"<?php echo $_50 ?>>50</option>
    <option value="100"<?php echo $_100 ?>>100</option>
  </select>
</div>

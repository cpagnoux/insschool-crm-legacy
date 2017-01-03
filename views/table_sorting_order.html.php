<!-- vim: set et: -->

<div class="display-option">
  <label for="order_sorting">Trier par :</label>

  <select id="order_sorting" name="order_sorting" onchange="this.form.submit()">
    <option value="date"<?php echo $date ?>>date croissante</option>
    <option value="date DESC"<?php echo $date_desc ?>>date décroissante</option>
  </select>
</div>

<div class="display-option">
  <label for="person_sorting">Trier par :</label>

  <select id="person_sorting" name="person_sorting" onchange="this.form.submit()">
    <option value="last_name, first_name"<?php echo $sorting_name ?>>ordre alphabétique</option>
    <option value="last_name DESC, first_name DESC"<?php echo $sorting_name_desc ?>>ordre alphabétique inverse</option>
  </select>
</div>

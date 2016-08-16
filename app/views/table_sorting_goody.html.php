<div class="display-option">
  <label for="goody_sorting">Trier par :</label>

  <select id="goody_sorting" name="goody_sorting" onchange="this.form.submit()">
    <option value="name"<?php echo $name ?>>ordre alphabétique</option>
    <option value="name DESC"<?php echo $name_desc ?>>ordre alphabétique inverse</option>
    <option value="price"<?php echo $price ?>>prix croissant</option>
    <option value="price DESC"<?php echo $price_desc ?>>prix décroissant</option>
  </select>
</div>

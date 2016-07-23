Trier par :
<select name="goody_sorting" onchange="this.form.submit()">
  <option value="name"<?php echo $sorting_name ?>>ordre alphabétique</option>
  <option value="name DESC"<?php echo $sorting_name_desc ?>>ordre alphabétique inverse</option>
  <option value="price"<?php echo $sorting_price ?>>prix croissant</option>
  <option value="price DESC"<?php echo $sorting_price_desc ?>>prix décroissant</option>
</select>

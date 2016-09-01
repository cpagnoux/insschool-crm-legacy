<div class="display-option">
  <label for="room_sorting">Trier par :</label>

  <select id="room_sorting" name="room_sorting" onchange="this.form.submit()">
    <option value="name"<?php echo $name ?>>ordre alphabétique</option>
    <option value="name DESC"<?php echo $name_desc ?>>ordre alphabétique inverse</option>
  </select>
</div>

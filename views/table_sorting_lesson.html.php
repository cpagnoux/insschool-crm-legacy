<div class="display-option">
  <label for="lesson_sorting">Trier par :</label>

  <select id="lesson_sorting" name="lesson_sorting" onchange="this.form.submit()">
    <option value="title"<?php echo $title ?>>ordre alphabétique</option>
    <option value="title DESC"<?php echo $title_desc ?>>ordre alphabétique inverse</option>
  </select>
</div>

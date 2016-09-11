<div class="form-row">
  Type de pré-inscription<br>

  <div class="form-group-option">
    <input id="with_lessons_true" type="radio" name="with_lessons" value="1" required<?php echo $true ?> onclick="showContent()">
    <label for="with_lessons_true" onclick="showContent()">Avec des cours</label>
  </div>

  <div class="form-group-option">
    <input id="with_lessons_false" type="radio" name="with_lessons" value="0"<?php echo $false ?> onclick="hideContent()">
    <label for="with_lessons_false" onclick="hideContent()">Sans cours</label>
  </div>
</div>

<div class="form-group">
  <?php if ($pre_registration_form && !isset($means_of_knowledge)): ?>
    Comment nous avez-vous connus ?<br>
  <?php else: ?>
    A connu INS School grâce à<br>
  <?php endif ?>

  <div class="form-group-option">
    <input id="poster_flyer" type="radio" name="means_of_knowledge" value="POSTER_FLYER" required<?php echo $poster_flyer ?>>
    <label for="poster_flyer">Affiches, Flyers</label>
  </div>

  <div class="form-group-option">
    <input id="internet" type="radio" name="means_of_knowledge" value="INTERNET"<?php echo $internet ?>>
    <label for="internet">Internet</label>
  </div>

  <div class="form-group-option">
    <input id="word_of_mouth" type="radio" name="means_of_knowledge" value="WORD_OF_MOUTH"<?php echo $word_of_mouth ?>>
    <label for="word_of_mouth">Bouche-à-oreille</label>
  </div>
</div>
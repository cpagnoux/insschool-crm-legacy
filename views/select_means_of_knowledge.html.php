<!-- vim: set expandtab: -->

<div class="form-group">
  <?php if ($pre_registration_form && !isset($means_of_knowledge)): ?>
    <label for="means_of_knowledge">Comment nous avez-vous connus ?</label>
  <?php else: ?>
    <label for="means_of_knowledge">A connu INS School grâce à</label>
  <?php endif ?>

  <select id="means_of_knowledge" name="means_of_knowledge" required>
    <option value="">Sélectionner</option>
    <option value="POSTER_FLYER"<?php echo $poster_flyer ?>>Affiches, Flyers</option>
    <option value="INTERNET"<?php echo $internet ?>>Internet</option>
    <option value="WORD_OF_MOUTH"<?php echo $word_of_mouth ?>>Bouche-à-oreille</option>
    <option value="ADVERTISING_PANEL"<?php echo $advertising_panel ?>>Panneau publicitaire</option>
  </select>
</div>

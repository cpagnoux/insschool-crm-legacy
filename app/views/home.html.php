<!-- vim: set et: -->

<div class="super-container">
  <?php display_incomplete_registrations() ?>
  <?php display_popular_lessons() ?>

  <div class="member-counter">
    Nombre d'adhérents (<?php echo current_season() ?>) : <?php echo member_count(current_season()) ?>
  </div>
</div>

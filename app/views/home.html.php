<!-- vim: set et: -->

<div class="super-container">
  <?php display_incomplete_registrations() ?>
  <?php display_popular_lessons() ?>

  <div class="member-counter">
    <strong>Saison <?php echo current_season() ?></strong><br>
    Nombre d'adhérents : <?php echo member_count(current_season()) ?><br>
    Bénéfices sur les inscriptions : <?php echo earnings_from_registrations(current_season()) ?> €<br>
    Nombre de goodies vendus : <?php echo total_goodies_sold(current_season()) ?><br>
    Bénéfices sur les commandes : <?php echo earnings_from_orders(current_season()) ?> €
  </div>
</div>

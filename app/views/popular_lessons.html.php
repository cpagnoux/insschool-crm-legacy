<div class="tiny-container">
  <p><strong>Cours les plus populaires de la saison <?php echo current_season() ?></strong></p>

  <?php if (count($registrant_counts) != 0): ?>
    <ol>
      <?php foreach ($registrant_counts as $lesson_id => $num_registrants): ?>
        <li><?php echo $titles[$lesson_id] ?> (<?php echo $num_registrants ?>)</li>
      <?php endforeach ?>
    </ol>
  <?php else: ?>
    <p>Rien à afficher pour le moment</p>
  <?php endif ?>
</div>

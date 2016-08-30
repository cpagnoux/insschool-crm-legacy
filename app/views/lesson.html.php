<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('lesson') ?></li>
  <li><?php echo $row['title'] ?></li>
</ol>

<div class="container">
  <h2><?php echo $row['title'] ?></h2>

  <p>
    <span class="attribute-name">Professeur :</span>
    <?php echo link_entity('teacher', $row['teacher_id'], get_name('teacher', $row['teacher_id'])) ?><br>
  </p>

  <p>
    <span class="attribute-name">Jour :</span>
    <?php echo eval_enum($row['day']) ?><br>
    <span class="attribute-name">Heure de début :</span>
    <?php echo format_time($row['start_time']) ?><br>
    <span class="attribute-name">Heure de fin :</span>
    <?php echo format_time($row['end_time']) ?><br>
    <span class="attribute-name">Durée :</span>
    <?php echo duration($row['start_time'], $row['end_time']) ?><br>
    <span class="attribute-name">Salle :</span>
    <?php echo link_entity('room', $row['room_id'], get_entity_name('room', $row['room_id'])) ?>
  </p>

  <p>
    <span class="attribute-name">Costume :</span><br>
    <?php echo $row['costume'] ?>
  </p>

  <p>
    <span class="attribute-name">Nombre d'inscrits (<?php echo current_season() ?>) :</span>
    <?php echo lesson_registrant_count($row['lesson_id'], current_season()) ?>
  </p>

  <ul class="action-links">
    <li><?php link_modify_entity('lesson', $row['lesson_id']) ?></li>
    <li><?php link_delete_entity('lesson', $row['lesson_id']) ?></li>
  </ul>
</div>

<?php display_lesson_registrants($link, $row['lesson_id'], current_season()) ?>

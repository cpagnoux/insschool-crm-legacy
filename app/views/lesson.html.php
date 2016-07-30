<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('lesson') ?> >
  <?php echo $row['title'] ?>
</nav>

<ul class="menu">
  <li><?php link_modify_entity('lesson', $row['lesson_id']) ?></li>
  <li><?php link_delete_entity('lesson', $row['lesson_id']) ?></li>
</ul>

<div class="container">
  <h2><?php echo $row['title'] ?></h2>

  <p>
    <span class="attribute-name">Professeur :</span>
    <?php echo get_name('teacher', $row['teacher_id']) ?><br>
  </p>

  <p>
    <span class="attribute-name">Jour :</span>
    <?php echo eval_enum($row['day']) ?><br>
    <span class="attribute-name">Heure de début :</span>
    <?php echo $row['start_time'] ?><br>
    <span class="attribute-name">Heure de fin :</span>
    <?php echo $row['end_time'] ?><br>
    <span class="attribute-name">Durée :</span>
    <?php echo duration($row['start_time'], $row['end_time']) ?><br>
    <span class="attribute-name">Salle :</span>
    <?php echo get_entity_name('room', $row['room_id']) ?>
  </p>

  <p>
    <span class="attribute-name">Costume :</span><br>
    <?php echo $row['costume'] ?>
  </p>

  <p>
    <span class="attribute-name">Nombre d'inscrits (<?php echo current_season() ?>) :</span>
    <?php echo lesson_registrant_count($row['lesson_id'], current_season()) ?>
  </p>
</div>

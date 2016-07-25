<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('lesson') ?> >
  <?php echo $row['title'] ?>
</nav>

<h2><?php echo $row['title'] ?></h2>

<p><b>Référence :</b> <?php echo $row['lesson_id'] ?></p>

<p><b>Professeur :</b> <?php echo get_name('teacher', $row['teacher_id']) ?><br>
<b>Jour :</b> <?php echo eval_enum($row['day']) ?><br>
<b>Heure de début :</b> <?php echo $row['start_time'] ?><br>
<b>Heure de fin :</b> <?php echo $row['end_time'] ?><br>
<b>Durée :</b> <?php echo duration($row['start_time'], $row['end_time']) ?><br>
<b>Salle :</b> <?php echo get_entity_name('room', $row['room_id']) ?></p>

<p><b>Costume :</b> <?php echo $row['costume'] ?><br>
<b>T-shirt :</b> <?php echo $row['t_shirt'] ?></p>

<p><b>Nombre d'inscrits (<?php echo current_season() ?>) :</b> <?php echo lesson_registrant_count($row['lesson_id'], current_season()) ?></p>

<div class="action-links">
  <?php link_modify_entity('lesson', $row['lesson_id']) ?>
  <?php link_delete_entity('lesson', $row['lesson_id']) ?>
</div>

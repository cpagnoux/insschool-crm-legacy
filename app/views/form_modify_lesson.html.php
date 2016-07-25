<?php $title = get_lesson_title($row['lesson_id']) ?>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('lesson') ?> >
  <?php link_entity('lesson', $row['lesson_id'], $title) ?> >
  Modifier le cours
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=lesson&amp;id=<?php echo $row['lesson_id'] ?>" method="post">
  <?php require 'views/form_lesson.html.php' ?>
</form>

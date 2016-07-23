<?php $name = get_name('teacher', $row['teacher_id']) ?>

<nav>
  <?php link_home() ?> >
  <?php link_table('teacher') ?> >
  <?php link_entity('teacher', $row['teacher_id'], $name) ?> >
  Modifier le professeur
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=teacher&amp;id=<?php echo $row['teacher_id'] ?>" method="post">
  <?php require 'views/form_teacher.html.php' ?>
</form>

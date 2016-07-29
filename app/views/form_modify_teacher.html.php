<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('teacher') ?> >
  <?php link_entity('teacher', $row['teacher_id'], $name) ?> >
  Modifier le professeur
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=teacher&amp;id=<?php echo $row['teacher_id'] ?>" method="post">
    <?php require 'views/form_content_teacher.html.php' ?>
  </form>
</div>

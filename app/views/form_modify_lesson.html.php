<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('lesson') ?> >
  <?php link_entity('lesson', $row['lesson_id'], $title) ?> >
  Modifier le cours
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=lesson&amp;id=<?php echo $row['lesson_id'] ?>" method="post">
    <?php require 'views/form_content_lesson.html.php' ?>
  </form>
</div>

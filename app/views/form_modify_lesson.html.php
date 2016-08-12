<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('lesson') ?> &gt;
  <?php link_entity('lesson', $row['lesson_id'], $title) ?> &gt;
  Modifier le cours
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=lesson&amp;id=<?php echo $row['lesson_id'] ?>" method="post">
    <?php require 'views/form_content_lesson.html.php' ?>
  </form>
</div>

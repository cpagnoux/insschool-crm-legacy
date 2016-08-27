<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('teacher') ?> &gt;
  <?php link_entity('teacher', $row['teacher_id'], $name) ?> &gt;
  Modifier le professeur
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=modify&amp;table=teacher&amp;id=<?php echo $row['teacher_id'] ?>" method="post">
    <?php require 'views/form_content_teacher.html.php' ?>
  </form>
</div>

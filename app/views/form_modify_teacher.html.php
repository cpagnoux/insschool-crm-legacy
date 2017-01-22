<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('teacher') ?></li>
  <li><?php link_entity('teacher', $row['teacher_id'], $name) ?></li>
  <li>Modifier le professeur</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=modify&amp;table=teacher&amp;id=<?php echo $row['teacher_id'] ?>" method="post">
    <?php require 'app/views/form_content_teacher.html.php' ?>
  </form>
</div>

<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('lesson') ?></li>
  <li><?php link_entity('lesson', $row['lesson_id'], $title) ?></li>
  <li>Modifier le cours</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=modify&amp;table=lesson&amp;id=<?php echo $row['lesson_id'] ?>" method="post">
    <?php require 'app/views/form_content_lesson.html.php' ?>
  </form>
</div>

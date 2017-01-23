<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('lesson') ?></li>
  <li>Nouveau cours</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=add&amp;table=lesson" method="post">
    <?php require 'app/views/form_content_lesson.html.php' ?>
  </form>
</div>

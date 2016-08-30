<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('teacher') ?></li>
  <li>Nouveau professeur</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=teacher" method="post">
    <?php require 'views/form_content_teacher.html.php' ?>
  </form>
</div>

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('lesson') ?></li>
  <li>Nouveau cours</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=lesson" method="post">
    <?php require 'views/form_content_lesson.html.php' ?>
  </form>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('lesson') ?> &gt;
  Nouveau cours
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=lesson" method="post">
    <?php require 'views/form_content_lesson.html.php' ?>
  </form>
</div>

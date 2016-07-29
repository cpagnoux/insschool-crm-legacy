<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('lesson') ?> >
  Nouveau cours
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=lesson" method="post">
    <?php require 'views/form_content_lesson.html.php' ?>
  </form>
</div>

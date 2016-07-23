<nav>
  <?php link_home() ?> >
  <?php link_table('lesson') ?> >
  Nouveau cours
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=lesson" method="post">
  <?php require 'views/form_lesson.html.php' ?>
</form>

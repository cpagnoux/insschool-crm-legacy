<nav>
  <?php link_home() ?> >
  <?php link_table('teacher') ?> >
  Nouveau professeur
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=teacher" method="post">
  <?php require 'views/form_teacher.html.php' ?>
</form>

<nav>
  <?php link_home() ?> >
  <?php link_table('goody') ?> >
  Nouveau goodies
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=goody" method="post">
  <?php require 'views/form_goody.html.php' ?>
</form>

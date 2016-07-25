<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('room') ?> >
  Nouvelle salle
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=room" method="post">
  <?php require 'views/form_room.html.php' ?>
</form>

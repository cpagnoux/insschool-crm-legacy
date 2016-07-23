<?php $name = get_entity_name('room', $row['room_id']) ?>

<nav>
  <?php link_home() ?> >
  <?php link_table('room') ?> >
  <?php link_entity('room', $row['room_id'], $name) ?> >
  Modifier la salle
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=room&amp;id=<?php echo $row['room_id'] ?>" method="post">
  <?php require 'views/form_room.html.php' ?>
</form>

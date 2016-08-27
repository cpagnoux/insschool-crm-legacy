<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('room') ?> &gt;
  <?php link_entity('room', $row['room_id'], $name) ?> &gt;
  Modifier la salle
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=modify&amp;table=room&amp;id=<?php echo $row['room_id'] ?>" method="post">
    <?php require 'views/form_content_room.html.php' ?>
  </form>
</div>

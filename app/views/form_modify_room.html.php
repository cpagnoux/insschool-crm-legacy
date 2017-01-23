<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('room') ?></li>
  <li><?php link_entity('room', $row['room_id'], $name) ?></li>
  <li>Modifier la salle</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=modify&amp;table=room&amp;id=<?php echo $row['room_id'] ?>" method="post">
    <?php require 'app/views/form_content_room.html.php' ?>
  </form>
</div>

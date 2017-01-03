<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('room') ?></li>
  <li>Nouvelle salle</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=room" method="post">
    <?php require 'views/form_content_room.html.php' ?>
  </form>
</div>

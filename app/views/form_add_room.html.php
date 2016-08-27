<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('room') ?> &gt;
  Nouvelle salle
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=room" method="post">
    <?php require 'views/form_content_room.html.php' ?>
  </form>
</div>

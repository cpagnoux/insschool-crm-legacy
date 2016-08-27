<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('goody') ?> &gt;
  <?php link_entity('goody', $row['goody_id'], $name) ?> &gt;
  Modifier le goodies
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=modify&amp;table=goody&amp;id=<?php echo $row['goody_id'] ?>" method="post">
    <?php require 'views/form_content_goody.html.php' ?>
  </form>
</div>

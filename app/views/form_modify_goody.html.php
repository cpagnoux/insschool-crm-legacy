<?php $name = get_entity_name('goody', $row['goody_id']) ?>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('goody') ?> >
  <?php link_entity('goody', $row['goody_id'], $name) ?> >
  Modifier le goodies
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=goody&amp;id=<?php echo $row['goody_id'] ?>" method="post">
  <?php require 'views/form_goody.html.php' ?>
</form>

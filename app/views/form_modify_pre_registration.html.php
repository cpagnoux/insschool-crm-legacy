<?php $name = get_name('pre_registration', $row['pre_registration_id']) ?>

<nav>
  <?php link_home() ?> >
  <?php link_table('pre_registration') ?> >
  <?php link_entity('pre_registration', $row['pre_registration_id'], $name) ?> >
  Modifier la pré-inscription
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=pre_registration&amp;id=<?php echo $row['pre_registration_id'] ?>" method="post">
  <?php form_entity_pre_registration($row) ?>
</form>

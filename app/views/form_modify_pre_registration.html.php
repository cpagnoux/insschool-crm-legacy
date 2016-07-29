<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('pre_registration') ?> >
  <?php link_entity('pre_registration', $row['pre_registration_id'], $name) ?> >
  Modifier la pré-inscription
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=pre_registration&amp;id=<?php echo $row['pre_registration_id'] ?>" method="post">
    <?php form_entity_pre_registration($row) ?>
  </form>
</div>

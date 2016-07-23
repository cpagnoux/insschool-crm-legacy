<?php $name = get_name('member', $row['member_id']) ?>

<nav>
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $row['member_id'], $name) ?> >
  Modifier l'adhérent
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=member&amp;id=<?php echo $row['member_id'] ?>" method="post">
  <?php form_entity_member($row) ?>
</form>

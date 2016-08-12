<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $row['member_id'], $name) ?> >
  <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> >
  Modifier l'inscription
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=registration&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <?php form_content_registration($row['member_id'], $row) ?>
  </form>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $member_id, $name) ?> >
  <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> >
  Modifier le dossier
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=registration_file&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <?php form_content_registration_file($row['registration_id'], $row) ?>
  </form>
</div>

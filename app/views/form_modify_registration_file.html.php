<?php $member_id = get_member_id($row['registration_id']) ?>
<?php $name = get_name('member', $member_id) ?>
<?php $season = get_registration_season($row['registration_id']) ?>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $member_id, $name) ?> >
  <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> >
  Modifier le dossier
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=registration_file&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <?php form_entity_registration_file($row['registration_id'], $row) ?>
  </form>
</div>

<?php $name = get_name('member', $row['member_id']) ?>
<?php $season = get_registration_season($row['registration_id']) ?>

<nav>
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $row['member_id'], $name) ?> <
  <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> >
  Modifier l'inscription
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=registration&amp;id=<?php echo $row['registration_id'] ?>" method="post">
  <?php require 'views/form_registration.html.php' ?>
</form>

<?php $member_id = get_member_id($id) ?>
<?php $name = get_name('member', $member_id) ?>
<?php $season = get_registration_season($id) ?>

<nav>
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $member_id, $name) ?> >
  <?php link_entity('registration', $id, 'Inscription ' . $season) ?> >
  Ajouter un cours
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=registration_detail" method="post">
  <?php require 'views/form_registration_detail.html.php' ?>
</form>

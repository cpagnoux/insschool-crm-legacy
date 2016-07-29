<?php $member_id = get_member_id($id) ?>
<?php $name = get_name('member', $member_id) ?>
<?php $season = get_registration_season($id) ?>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $member_id, $name) ?> >
  <?php link_entity('registration', $id, 'Inscription ' . $season) ?> >
  Ajouter un cours
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=registration_detail" method="post">
    <?php require 'views/form_content_registration_detail.html.php' ?>
  </form>
</div>

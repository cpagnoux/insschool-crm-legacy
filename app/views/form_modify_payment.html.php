<?php switch ($table): ?>
<?php case 'order_payment': ?>
  <nav class="breadcrumb">
    <?php link_home() ?> >
    <?php link_table('order') ?> >
    <?php link_entity('order', $row['order_id'], 'N° ' . $row['order_id']) ?> >
    Modifier le paiement
  </nav>
  <?php break ?>
<?php case 'registration_payment': ?>
  <?php $member_id = get_member_id($row['registration_id']) ?>
  <?php $name = get_name('member', $member_id) ?>
  <?php $season = get_registration_season($row['registration_id']) ?>
  <nav class="breadcrumb">
    <?php link_home() ?> >
    <?php link_table('member') ?> >
    <?php link_entity('member', $member_id, $name) ?> >
    <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> >
    Modifier le paiement
  </nav>
  <?php break ?>
<?php endswitch ?>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=<?php echo $table ?>&amp;id=<?php echo $row[$table . '_id'] ?>" method="post">
    <?php $id = $row[$ref_table . '_id'] ?>
    <?php require 'views/form_payment.html.php' ?>
  </form>
</div>

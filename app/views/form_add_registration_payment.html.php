<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $member_id, $name) ?> >
  <?php link_entity('registration', $registration_id, 'Inscription ' . $season) ?> >
  Nouveau paiement
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=registration_payment" method="post">
    <?php require 'views/form_content_payment.html.php' ?>
  </form>
</div>

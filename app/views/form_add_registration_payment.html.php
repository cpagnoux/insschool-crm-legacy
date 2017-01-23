<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $member_id, $name) ?></li>
  <li><?php link_entity('registration', $registration_id, 'Inscription ' . $season) ?></li>
  <li>Nouveau paiement</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=add&amp;table=registration_payment" method="post">
    <?php require 'app/views/form_content_payment.html.php' ?>
  </form>
</div>

<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $member_id, $name) ?></li>
  <li><?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?></li>
  <li>Modifier le paiement</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=modify&amp;table=registration_payment&amp;id=<?php echo $row['registration_payment_id'] ?>" method="post">
    <?php require 'app/views/form_content_payment.html.php' ?>
  </form>
</div>

<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('order') ?></li>
  <li><?php link_entity('order', $order_id, 'N° ' . $order_id) ?></li>
  <li>Nouveau paiement</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=order_payment" method="post">
    <?php require 'views/form_content_payment.html.php' ?>
  </form>
</div>

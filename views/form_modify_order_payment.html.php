<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('order') ?></li>
  <li><?php link_entity('order', $row['order_id'], 'N° ' . $row['order_id']) ?></li>
  <li>Modifier le paiement</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=modify&amp;table=order_payment&amp;id=<?php echo $row['order_payment_id'] ?>" method="post">
    <?php require 'views/form_content_payment.html.php' ?>
  </form>
</div>

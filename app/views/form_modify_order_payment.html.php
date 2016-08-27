<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('order') ?> &gt;
  <?php link_entity('order', $row['order_id'], 'N° ' . $row['order_id']) ?> &gt;
  Modifier le paiement
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=modify&amp;table=order_payment&amp;id=<?php echo $row['order_payment_id'] ?>" method="post">
    <?php require 'views/form_content_payment.html.php' ?>
  </form>
</div>

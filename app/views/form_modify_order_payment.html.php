<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  <?php link_entity('order', $row['order_id'], 'N° ' . $row['order_id']) ?> >
  Modifier le paiement
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=order_payment&amp;id=<?php echo $row['order_payment_id'] ?>" method="post">
    <?php $id = $row['order_id'] ?>
    <?php require 'views/form_payment.html.php' ?>
  </form>
</div>

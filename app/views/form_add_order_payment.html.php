<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('order') ?> &gt;
  <?php link_entity('order', $order_id, 'N° ' . $order_id) ?> &gt;
  Nouveau paiement
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=order_payment" method="post">
    <?php require 'views/form_content_payment.html.php' ?>
  </form>
</div>

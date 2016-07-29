<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  <?php link_entity('order', $id, 'N° ' . $id) ?> >
  Nouveau paiement
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order_payment" method="post">
    <?php require 'views/form_content_payment.html.php' ?>
  </form>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  <?php link_entity('order', $row['order_id'], 'N° ' . $row['order_id']) ?> >
  Modifier la commande
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=order&amp;id=<?php echo $row['order_id'] ?>" method="post">
  <?php require 'views/form_order.html.php' ?>
</form>

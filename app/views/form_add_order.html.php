<nav>
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  Nouvelle commande
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order" method="post">
  <?php require 'views/form_order.html.php' ?>
</form>

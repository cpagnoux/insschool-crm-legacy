<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  Nouvelle commande
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order" method="post">
    <?php require 'views/form_order.html.php' ?>
  </form>
</div>

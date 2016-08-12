<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('order') ?> &gt;
  Nouvelle commande
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order" method="post">
    <?php require 'views/form_content_order.html.php' ?>
  </form>
</div>

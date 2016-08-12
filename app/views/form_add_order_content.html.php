<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('order') ?> &gt;
  <?php link_entity('order', $order_id, 'N° ' . $order_id) ?> &gt;
  Ajouter un article
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order_content" method="post">
    <?php require 'views/form_content_order_content.html.php' ?>
  </form>
</div>

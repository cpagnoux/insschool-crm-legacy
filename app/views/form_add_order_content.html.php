<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  <?php link_entity('order', $id, 'N° ' . $id) ?> >
  Ajouter un article
</nav>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order_content" method="post">
  <?php require 'views/form_order_content.html.php' ?>
</form>

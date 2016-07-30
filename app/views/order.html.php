<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  N° <?php echo $row['order_id'] ?>
</nav>

<?php if (!order_paid($row['order_id']) || order_total($row['order_id']) == 0):?>
  <ul class="menu">
    <li><?php link_modify_entity('order', $row['order_id']) ?></li>
    <li><?php link_delete_entity('order', $row['order_id']) ?></li>
  </ul>
<?php endif ?>

<div class="container">
  <h2>Commande n° <?php echo $row['order_id'] ?></h2>

  <p>
    <b>Adhérent :</b>
    <?php echo get_name('member', $row['member_id']) ?>
  </p>

  <p>
    <b>Date :</b>
    <?php echo $row['date'] ?>
  </p>

  <?php display_order_content($link, $row['order_id']) ?>
</div>

<?php display_entity_payments($link, 'order', $row['order_id']) ?>

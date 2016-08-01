<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('order') ?> >
  N° <?php echo $row['order_id'] ?>
</nav>

<div class="container">
  <h2>Commande n° <?php echo $row['order_id'] ?></h2>

  <p>
    <span class="attribute-name">Adhérent :</span>
    <?php echo link_entity('member', $row['member_id'], get_name('member', $row['member_id'])) ?>
  </p>

  <p>
    <span class="attribute-name">Date :</span>
    <?php echo $row['date'] ?>
  </p>

  <?php display_order_content($link, $row['order_id']) ?>

  <?php if (!order_paid($row['order_id']) || order_total($row['order_id']) == 0):?>
    <ul class="action-links">
      <li><?php link_delete_entity('order', $row['order_id']) ?></li>
    </ul>
  <?php endif ?>
</div>

<?php display_entity_payments($link, 'order', $row['order_id']) ?>

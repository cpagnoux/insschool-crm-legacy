<?php navigation_path_on_display('order', $row) ?>

<h2>Commande n° <?php echo $row['order_id'] ?></h2>

<p><b>Adhérent :</b> <?php echo get_name('member', $row['member_id']) ?></p>

<p><b>Date :</b> <?php echo $row['date'] ?></p>

<?php display_order_content($link, $row['order_id']) ?>

<?php if (!order_paid($row['order_id']) || order_total($row['order_id']) == 0):?>
  <p><?php echo link_modify_entity('order', $row['order_id']) ?>

  <?php echo link_delete_entity('order', $row['order_id']) ?></p>
<?php endif ?>

<?php display_entity_payments($link, 'order', $row['order_id']) ?>

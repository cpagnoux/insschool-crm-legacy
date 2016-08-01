<form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify_quantity&amp;order_id=<?php echo $order_id ?>&amp;goody_id=<?php echo $row['goody_id'] ?>" method="post">
  <?php link_quantity_minus($order_id, $row['goody_id'], $row['quantity'] - 1) ?>
  <input class="quantity-input" type="text" name="quantity" value="<?php echo $row['quantity'] ?>" maxlength="2" onchange="this.form.submit()">
  <?php link_quantity_plus($order_id, $row['goody_id'], $row['quantity'] + 1) ?>
</form>

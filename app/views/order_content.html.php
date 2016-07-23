<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun article</p>
  <div>
    <?php link_add_entity('order_content', $order_id) ?>
    <?php link_empty_cart($order_id) ?>
  </div>
  <?php return ?>
<?php endif ?>

<table>
  <tr>
    <th><b>Référence</b></th>
    <th><b>Désignation</b></th>
    <th><b>Prix unitaire</b></th>
    <th><b>Quantité</b></th>
    <th><b>Total</b></th>

    <?php if (!order_paid($order_id)): ?>
      <th></th>
    <?php endif ?>

  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['goody_id'] ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['price'] ?> €</td>

      <?php if (order_paid($order_id)): ?>
        <td><?php echo $row['quantity'] ?></td>
      <?php else: ?>
        <td>
          <?php require 'views/form_quantity.html.php' ?>
        </td>
      <?php endif ?>

      <td><?php echo total_by_product($row['price'], $row['quantity']) ?> €</td>

      <?php if (!order_paid($order_id)): ?>
	<td><?php link_remove_product($order_id, $row['goody_id']) ?></td>
      <?php endif ?>

    </tr>
  <?php endwhile ?>

</table>

<p><b>TOTAL :</b> <?php echo order_total($order_id) ?> €</p>

<?php if (!order_paid($order_id) || order_total($order_id) == 0): ?>
  <div>
    <?php link_add_entity('order_content', $order_id) ?>
    <?php link_empty_cart($order_id) ?>
  </div>
<?php endif ?>

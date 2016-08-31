<?php if (mysqli_num_rows($result) != 0): ?>
  <table>
    <tr>
      <th>Désignation</th>
      <th>Prix unitaire</th>
      <th>Quantité</th>
      <th>Total</th>

      <?php if (!order_paid($order_id)): ?>
        <th></th>
      <?php endif ?>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php $row = html_encode_strings($row) ?>

      <tr>
        <td><?php echo link_entity('goody', $row['goody_id'], $row['name']) ?></td>
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

  <p>
    <span class="attribute-name">TOTAL :</span>
    <?php echo order_total($order_id) ?> €
  </p>
<?php else: ?>
  <p>Aucun article</p>
<?php endif ?>

<?php if (!order_paid($order_id) || order_total($order_id) == 0): ?>
  <ul class="action-links">
    <li><?php link_add_entity('order_content', $order_id) ?></li>
    <li><?php link_empty_cart($order_id) ?></li>
  </ul>
<?php endif ?>

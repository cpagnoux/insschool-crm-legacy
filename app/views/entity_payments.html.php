<ul class="menu">
  <li><?php link_add_entity($table . '_payment', $id) ?></li>
</ul>

<div class="container">
  <h2>Paiements</h2>

  <?php if (mysqli_num_rows($result) == 0): ?>
      <p>Aucun paiement</p>
    </div>
    <?php return ?>
  <?php endif ?>

  <table>
    <tr>
      <th>Montant</th>
      <th>Mode de paiement</th>
      <th>Date</th>
      <th></th>
      <th></th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['amount'] ?> €</td>
        <td><?php echo eval_enum($row['mode']) ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php link_modify_entity($table . '_payment', $row[$table . '_payment_id']) ?></td>
        <td><?php link_delete_entity($table . '_payment', $row[$table . '_payment_id']) ?></td>
      </tr>
    <?php endwhile ?>

  </table>

  <p>
    <span class="attribute-name">Total payé :</span>
    <?php echo total_paid($table, $id) ?> €<br>
  </p>

<?php switch ($table): ?>
<?php case 'order': ?>
  <p>
    <span class="attribute-name">Commande réglée :</span>
    <?php echo eval_boolean(order_paid($id)) ?>
  </p>
  <?php break ?>
<?php case 'registration': ?>
  <p>
    <span class="attribute-name">Inscription réglée :</span>
    <?php echo eval_boolean(registration_paid($id)) ?>
  </p>
  <?php break ?>
<?php endswitch ?>
</div>

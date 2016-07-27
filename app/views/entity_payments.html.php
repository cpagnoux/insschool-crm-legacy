<div class="menu">
  <?php link_add_entity($table . '_payment', $id) ?>
</div>

<div class="container">
  <h2>Paiements</h2>

  <?php if (mysqli_num_rows($result) == 0): ?>
      <p>Aucun paiement</p>
    </div>
    <?php return ?>
  <?php endif ?>

  <table>
    <tr>
      <th><b>Montant</b></th>
      <th><b>Mode de paiement</b></th>
      <th><b>Date</b></th>
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

  <p><b>Total payé :</b> <?php echo total_paid($table, $id) ?> €<br></p>

<?php switch ($table): ?>
<?php case 'order': ?>
  <p><b>Commande réglée :</b> <?php echo eval_boolean(order_paid($id)) ?></p>
  <?php break ?>
<?php case 'registration': ?>
  <p><b>Inscription réglée :</b> <?php echo eval_boolean(registration_paid($id)) ?></p>
  <?php break ?>
<?php endswitch ?>
</div>

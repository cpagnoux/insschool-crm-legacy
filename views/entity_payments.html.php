<div class="container">
  <h1>Paiements</h1>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <table>
      <tr>
        <th>Montant</th>
        <th>Mode de paiement</th>
        <th>Date d'encaissement</th>
        <th>Commentaire</th>
        <th>Date</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['amount'] ?> €</td>
          <td><?php echo eval_enum($row['mode']) ?></td>
          <td><?php echo format_date($row['cashing_date']) ?></td>
          <td class="text-cell"><?php echo $row['comment'] ?></td>
          <td><?php echo format_date($row['date']) ?></td>

          <td>
            <?php link_modify_entity($table . '_payment', $row[$table . '_payment_id']) ?>
            <?php link_delete_entity($table . '_payment', $row[$table . '_payment_id']) ?>
          </td>
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

  <?php else: ?>
      <p>Aucun paiement</p>
  <?php endif ?>

  <ul class="action-links">
    <li><?php link_add_entity($table . '_payment', $id) ?></li>
  </ul>
</div>

<!-- vim: set et: -->

<div class="container">
  <h1>Inscriptions</h1>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <table>
      <tr>
        <th>Saison</th>
        <th>Statut</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>

        <tr>
          <td class="centered"><?php echo $row['season'] ?></td>
          <td class="centered"><?php echo eval_boolean(registration_ok($row['registration_id']), 'ok/nonok') ?></td>
          <td><?php link_entity('registration', $row['registration_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>
  <?php else: ?>
    <p>Aucune inscription</p>
  <?php endif ?>

  <ul class="action-links">
    <li><?php link_add_entity('registration', $member_id) ?></li>
  </ul>
</div>

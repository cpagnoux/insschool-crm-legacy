<!-- vim: set expandtab: -->

<div class="tiny-container">
  <p><strong>Inscriptions incomplètes</strong></p>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <ul>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>
        <li><?php link_entity('registration', $row['registration_id'], $row['first_name'] . ' ' . strtoupper($row['last_name']) . ' (' . $row['season'] . ')') ?></li>
      <?php endwhile ?>
    </ul>
  <?php else: ?>
    <p>Rien à afficher</p>
  <?php endif ?>
</div>

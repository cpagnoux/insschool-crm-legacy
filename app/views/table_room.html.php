<nav class="breadcrumb">
  <?php link_home() ?> >
  Salles
</nav>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_display_options('room') ?>

    <table class="db-table">
      <tr>
        <th>Nom</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['name'] ?></td>
          <td><?php link_entity('room', $row['room_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucune salle</p>
  <?php endif ?>
</div>

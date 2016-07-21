<?php navigation_path_on_table('room') ?>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune salle</p>
  <?php return ?>
<?php endif ?>

<p><?php table_display_options('room') ?></p>

<table>
  <tr>
    <th><b>Nom</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo link_entity('room', $row['room_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php table_pagination($table, $page) ?></p>

<p><?php echo link_add_entity($table) ?></p>

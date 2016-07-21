<?php navigation_path_on_table('goody') ?>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun goodies</p>
  <?php return ?>
<?php endif ?>

<p><?php table_display_options('goody') ?></p>

<table>
  <tr>
    <th><b>Désignation</b></th>
    <th><b>Prix</b></th>
    <th><b>Stock</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['price'] ?> €</td>
      <td><?php echo product_status($row['stock']) ?></td>
      <td><?php echo link_entity('goody', $row['goody_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php table_pagination($table, $page) ?></p>

<p><?php echo link_add_entity($table) ?></p>

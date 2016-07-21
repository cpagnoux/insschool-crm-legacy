<?php navigation_path_on_table('order') ?>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune commande</p>
  <?php return ?>
<?php endif ?>

<p><?php table_display_options('order') ?></p>

<table>
  <tr>
    <th><b>N° de commande</b></th>
    <th><b>Adhérent</b></th>
    <th><b>Date</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['order_id'] ?></td>
      <td><?php echo get_name('member', $row['member_id']) ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo link_entity('order', $row['order_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php table_pagination($table, $page) ?></p>

<p><?php echo link_add_entity($table) ?></p>

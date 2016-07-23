<nav>
  <?php link_home() ?> >
  Commandes
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune commande</p>
  <div>
    <?php link_add_entity($table) ?>
  </div>
  <?php return ?>
<?php endif ?>

<?php table_display_options('order') ?>

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
      <td><?php link_entity('order', $row['order_id']) ?></td>
    </tr>
  <?php endwhile ?>

</table>

<?php table_pagination($table, $page) ?>

<div>
  <?php link_add_entity($table) ?>
</div>

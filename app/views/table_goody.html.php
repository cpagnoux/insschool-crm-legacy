<nav class="breadcrumb">
  <?php link_home() ?> >
  Goodies
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun goodies</p>
  <div class="action-links">
    <?php link_add_entity($table) ?>
  </div>
  <?php return ?>
<?php endif ?>

<?php table_display_options('goody') ?>

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
      <td><?php link_entity('goody', $row['goody_id']) ?></td>
    </tr>
  <?php endwhile ?>

</table>

<?php table_pagination($table, $page) ?>

<div class="action-links">
  <?php link_add_entity($table) ?>
</div>

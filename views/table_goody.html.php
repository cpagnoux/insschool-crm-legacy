<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Goodies</li>
</ol>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_display_options('goody') ?>

    <table>
      <tr>
        <th>Désignation</th>
        <th>Prix</th>
        <th>Stock</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>

        <tr>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['price'] ?> €</td>
          <td><?php echo product_status($row['stock']) ?></td>
          <td><?php link_entity('goody', $row['goody_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucun goodies</p>
  <?php endif ?>
</div>

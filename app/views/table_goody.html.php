<!-- vim: set et: -->

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
        <th>Quantité vendue (<?php echo current_season() ?>)</th>
        <th>Somme vendue (<?php echo current_season() ?>)</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>

        <tr>
          <td><?php echo $row['name'] ?></td>
          <td class="right-aligned"><?php echo $row['price'] ?> €</td>
          <td class="centered"><?php echo product_status($row['stock']) ?></td>
          <td class="right-aligned"><?php echo goodies_sold($row['goody_id'], current_season()) ?></td>
          <td class="right-aligned"><?php echo earnings_from_goody($row['goody_id'], current_season()) ?> €</td>
          <td><?php link_entity('goody', $row['goody_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucun goodies</p>
  <?php endif ?>
</div>

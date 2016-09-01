<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Commandes</li>
</ol>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_filter_order() ?>
    <?php table_display_options('order') ?>

    <table>
      <tr>
        <th>N° de commande</th>
        <th>Adhérent</th>
        <th>Date</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['order_id'] ?></td>
          <td><?php echo get_name('member', $row['member_id']) ?></td>
          <td><?php echo format_date($row['date']) ?></td>
          <td><?php link_entity('order', $row['order_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page, $filter) ?>
  <?php elseif (row_count($table) != 0): ?>
    <?php table_filter_order() ?>
  <?php else: ?>
    <p>Aucune commande</p>
  <?php endif ?>
</div>

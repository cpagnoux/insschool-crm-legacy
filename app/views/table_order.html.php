<nav class="breadcrumb">
  <?php link_home() ?> >
  Commandes
</nav>

<ul class="menu">
  <li><?php link_add_entity($table) ?></li>
</ul>

<?php if (mysqli_num_rows($result) == 0): ?>
  <div class="container">
    <p>Aucune commande</p>
  </div>

  <?php return ?>
<?php endif ?>

<div class="container">
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
        <td><?php echo $row['date'] ?></td>
        <td><?php link_entity('order', $row['order_id']) ?></td>
      </tr>
    <?php endwhile ?>
  </table>

  <?php table_pagination($table, $page) ?>
</div>

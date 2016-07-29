<nav class="breadcrumb">
  <?php link_home() ?> >
  Commandes
</nav>

<div class="menu">
  <?php link_add_entity($table) ?>
</div>

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
</div>
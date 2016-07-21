<?php navigation_path_on_table('member') ?>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun adhérent</p>
  <?php return ?>
<?php endif ?>

<p><?php table_display_options('member') ?></p>

<table>
  <tr>
    <th><b>Nom</b></th>
    <th><b>Prénom</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['last_name'] ?></td>
      <td><?php echo $row['first_name'] ?></td>
      <td><?php echo link_entity('member', $row['member_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php table_pagination($table, $page) ?></p>

<p><?php echo link_add_entity($table) ?></p>

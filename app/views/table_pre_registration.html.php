<?php navigation_path_on_table('pre_registration') ?>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune pré-inscription</p>
  <?php return ?>
<?php endif ?>

<p><?php table_display_options('pre_registration') ?></p>

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
      <td><?php echo link_entity('pre_registration', $row['pre_registration_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php table_pagination($table, $page) ?></p>

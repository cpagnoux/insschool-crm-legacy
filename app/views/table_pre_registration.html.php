<nav>
  <?php link_home() ?> >
  Pré-inscriptions
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune pré-inscription</p>
  <?php return ?>
<?php endif ?>

<?php table_display_options('pre_registration') ?>

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
      <td><?php link_entity('pre_registration', $row['pre_registration_id']) ?></td>
    </tr>
  <?php endwhile ?>

</table>

<?php table_pagination($table, $page) ?>

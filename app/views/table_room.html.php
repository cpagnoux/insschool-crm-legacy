<nav>
  <?php link_home() ?> >
  Salles
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune salle</p>
  <div>
    <?php link_add_entity($table) ?>
  </div>
  <?php return ?>
<?php endif ?>

<?php table_display_options('room') ?>

<table>
  <tr>
    <th><b>Nom</b></th>
    <th></th>
  </tr>

  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['name'] ?></td>
      <td><?php link_entity('room', $row['room_id']) ?></td>
    </tr>
  <?php endwhile ?>

</table>

<?php table_pagination($table, $page) ?>

<div>
  <?php link_add_entity($table) ?>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> >
  Salles
</nav>

<ul class="menu">
  <li><?php link_add_entity($table) ?></li>
</ul>

<?php if (mysqli_num_rows($result) == 0): ?>
  <div class="container">
    <p>Aucune salle</p>
  </div>
  <?php return ?>
<?php endif ?>

<div class="container">
  <?php table_display_options('room') ?>

  <table>
    <tr>
      <th>Nom</th>
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
</div>

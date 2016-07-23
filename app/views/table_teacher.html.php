<nav>
  <?php link_home() ?> >
  Professeurs
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun professeur</p>
  <div>
    <?php link_add_entity($table) ?>
  </div>
  <?php return ?>
<?php endif ?>

<?php table_display_options('teacher') ?>

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
      <td><?php link_entity('teacher', $row['teacher_id']) ?></td>
    </tr>
  <?php endwhile ?>

</table>

<?php table_pagination($table, $page) ?>

<div>
  <?php link_add_entity($table) ?>
</div>

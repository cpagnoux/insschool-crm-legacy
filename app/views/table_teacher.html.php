<nav class="breadcrumb">
  <?php link_home() ?> >
  Professeurs
</nav>

<ul class="menu">
  <li><?php link_add_entity($table) ?></li>
</ul>

<?php if (mysqli_num_rows($result) == 0): ?>
  <div class="container">
    <p>Aucun professeur</p>
  </div>
  <?php return ?>
<?php endif ?>

<div class="container">
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
</div>

<nav class="breadcrumb">
  <?php link_home() ?> >
  Cours
</nav>

<div class="menu">
  <?php link_add_entity($table) ?>
</div>

<?php if (mysqli_num_rows($result) == 0): ?>
  <div class="container">
    <p>Aucun cours</p>
  </div>
  <?php return ?>
<?php endif ?>

<div class="container">
  <?php table_display_options('lesson') ?>

  <table>
    <tr>
      <th><b>Intitulé</b></th>
      <th></th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['title'] ?></td>
        <td><?php link_entity('lesson', $row['lesson_id']) ?></td>
      </tr>
    <?php endwhile ?>

  </table>

  <?php table_pagination($table, $page) ?>
</div>

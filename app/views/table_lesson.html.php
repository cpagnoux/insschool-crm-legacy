<nav class="breadcrumb">
  <?php link_home() ?> >
  Cours
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun cours</p>
  <div class="action-links">
    <?php link_add_entity($table) ?>
  </div>
  <?php return ?>
<?php endif ?>

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

<div class="action-links">
  <?php link_add_entity($table) ?>
</div>

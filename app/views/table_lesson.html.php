<?php navigation_path_on_table('lesson') ?>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun cours</p>
  <?php return ?>
<?php endif ?>

<p><?php table_display_options('lesson') ?></p>

<table>
  <tr>
    <th><b>Intitulé</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['title'] ?></td>
      <td><?php echo link_entity('lesson', $row['lesson_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php table_pagination($table, $page) ?>

<p><?php echo link_add_entity($table) ?></p>

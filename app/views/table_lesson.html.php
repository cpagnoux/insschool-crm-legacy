<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Cours</li>
</ol>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_display_options('lesson') ?>

    <table class="db-table">
      <tr>
        <th>Intitulé</th>
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
  <?php else: ?>
    <p>Aucun cours</p>
  <?php endif ?>
</div>

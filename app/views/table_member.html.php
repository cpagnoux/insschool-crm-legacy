<nav class="breadcrumb">
  <?php link_home() ?> >
  Adhérents
</nav>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_display_options('member') ?>

    <table class="db-table">
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['last_name'] ?></td>
          <td><?php echo $row['first_name'] ?></td>
          <td><?php link_entity('member', $row['member_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucun adhérent</p>
  <?php endif ?>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> >
  Adhérents
</nav>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun adhérent</p>
  <div class="action-links">
    <?php link_add_entity($table) ?>
  </div>
  <?php return ?>
<?php endif ?>

<?php table_display_options('member') ?>

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
      <td><?php link_entity('member', $row['member_id']) ?></td>
    </tr>
  <?php endwhile ?>

</table>

<?php table_pagination($table, $page) ?>

<div class="action-links">
  <?php link_add_entity($table) ?>
</div>

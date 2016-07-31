<nav class="breadcrumb">
  <?php link_home() ?> >
  Adhérents
</nav>

<ul class="menu">
  <li><?php link_add_entity($table) ?></li>
</ul>

<?php if (mysqli_num_rows($result) == 0): ?>
  <div class="container">
    <p>Aucun adhérent</p>
  </div>

  <?php return ?>
<?php endif ?>

<div class="container">
  <?php table_display_options('member') ?>

  <table>
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
</div>

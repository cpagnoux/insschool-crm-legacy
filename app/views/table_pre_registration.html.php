<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Pré-inscriptions</li>
</ol>

<div class="container">
  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_display_options('pre_registration') ?>

    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>

        <tr>
          <td><?php echo $row['last_name'] ?></td>
          <td><?php echo $row['first_name'] ?></td>
          <td><?php link_entity('pre_registration', $row['pre_registration_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucune pré-inscription</p>
  <?php endif ?>
</div>

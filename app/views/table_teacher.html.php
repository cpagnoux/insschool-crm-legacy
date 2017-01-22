<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Professeurs</li>
</ol>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
    <li><?php link_send_mail_to_multiple_recipients($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_display_options('teacher') ?>

    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>

        <tr>
          <td><?php echo strtoupper($row['last_name']) ?></td>
          <td><?php echo $row['first_name'] ?></td>
          <td><?php link_entity('teacher', $row['teacher_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucun professeur</p>
  <?php endif ?>
</div>

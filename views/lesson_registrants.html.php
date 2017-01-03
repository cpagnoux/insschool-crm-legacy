<!-- vim: set et: -->

<div class="container">
  <h1>Inscrits</h1>

  <?php if (mysqli_num_rows($result) != 0): ?>
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
          <td><?php echo link_entity('member', $row['member_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <ul class="action-links">
      <li><?php link_send_mail_to_lesson_registrants($lesson_id, current_season()) ?></li>
    </ul>
  <?php else: ?>
    <p>Aucun inscrit</p>
  <?php endif ?>
</div>

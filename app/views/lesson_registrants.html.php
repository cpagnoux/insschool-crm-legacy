<div class="container">
  <h2>Inscrits</h2>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['last_name'] ?></td>
          <td><?php echo $row['first_name'] ?></td>
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

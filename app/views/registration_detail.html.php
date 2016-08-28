<div class="container">
  <h2>Cours choisis</h2>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <table>
      <tr>
        <th>Cours</th>
        <th>Participation à l'INS Show</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo link_entity('lesson', $row['lesson_id'], $row['title']) ?></td>

          <td>
            <?php link_toggle_show_participation($registration_id, $row['lesson_id'], $row['show_participation']) ?>
          </td>

          <td><?php link_remove_lesson($registration_id, $row['lesson_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>
  <?php else: ?>
    <p>Aucun cours<br></p>
  <?php endif ?>

  <ul class="action-links">
    <li><?php link_add_entity('registration_detail', $registration_id) ?></li>
  </ul>
</div>

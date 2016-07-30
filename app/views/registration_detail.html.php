<ul class="menu">
  <li><?php link_add_entity('registration_detail', $registration_id) ?></li>
</ul>

<div class="container">
  <h2>Cours choisis</h2>

  <?php if (mysqli_num_rows($result) == 0): ?>
      <p>Aucun cours<br></p>
    </div>
    <?php return ?>
  <?php endif ?>

  <table>
    <tr>
      <th>Cours</th>
      <th>Participation à l'INS Show</th>
      <th></th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo eval_boolean($row['show_participation']) ?> <?php link_toggle_show_participation($registration_id, $row['lesson_id']) ?></td>
        <td><?php link_remove_lesson($registration_id, $row['lesson_id']) ?></td>
      </tr>
    <?php endwhile ?>

  </table>
</div>

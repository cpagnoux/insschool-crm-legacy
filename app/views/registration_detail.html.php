<h2>Cours choisis</h2>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucun cours<br></p>
  <p><?php echo link_add_entity('registration_detail', $registration_id) ?></p>
  <?php return ?>
<?php endif ?>

<table>
  <tr>
    <th><b>Cours</b></th>
    <th><b>Participation à l'INS Show</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['title'] ?></td>
      <td><?php echo eval_boolean($row['show_participation']) ?> <?php echo link_toggle_show_participation($registration_id, $row['lesson_id']) ?></td>
      <td><?php echo link_remove_lesson($registration_id, $row['lesson_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php echo link_add_entity('registration_detail', $registration_id) ?></p>

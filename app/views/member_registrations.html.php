<h2>Inscriptions</h2>

<?php if (mysqli_num_rows($result) == 0): ?>
  <p>Aucune inscription</p>
  <p><?php echo link_add_entity('registration', $member_id) ?></p>
  <?php return ?>
<?php endif ?>

<table>
  <tr>
    <th><b>Saison</b></th>
    <th></th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?php echo $row['season'] ?></td>
      <td><?php echo link_entity('registration', $row['registration_id']) ?></td>
    </tr>
  <?php endwhile ?>
</table>

<p><?php echo link_add_entity('registration', $member_id) ?></p>

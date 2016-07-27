<div class="menu">
  <?php link_add_entity('registration', $member_id) ?>
</div>

<div class="container">
  <h2>Inscriptions</h2>

  <?php if (mysqli_num_rows($result) == 0): ?>
      <p>Aucune inscription</p>
    </div>
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
        <td><?php link_entity('registration', $row['registration_id']) ?></td>
      </tr>
    <?php endwhile ?>

  </table>

</div>

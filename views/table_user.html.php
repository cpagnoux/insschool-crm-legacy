<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Comptes utilisateurs</li>
</ol>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <table>
      <tr>
        <th>Nom d'utilisateur</th>
        <th>Administrateur</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <?php $row = html_encode_strings($row) ?>

        <tr>
          <td><?php echo $row['username'] ?></td>

          <td>
            <?php if ($row['username'] != $_SESSION['username']): ?>
              <?php link_toggle_admin($row['username'], $row['admin']) ?>
            <?php else: ?>
              <?php echo eval_boolean($row['admin']) ?>
            <?php endif ?>
          </td>

          <td>
            <?php if ($row['username'] != $_SESSION['username']): ?>
              <?php link_reset_password($row['username']) ?>
              <?php link_delete_user($row['username']) ?>
            <?php endif ?>
          </td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page) ?>
  <?php else: ?>
    <p>Aucun compte utilisateur</p>
  <?php endif ?>
</div>

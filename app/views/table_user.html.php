<nav class="breadcrumb">
  <?php link_home() ?> >
  Comptes utilisateurs
</nav>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <table class="db-table">
      <tr>
        <th>Nom d'utilisateur</th>
        <th>Administrateur</th>
        <th></th>
      </tr>

      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $row['username'] ?></td>

          <td>
            <?php echo eval_boolean($row['admin']) ?>

            <?php if ($row['username'] != $_SESSION['username']): ?>
              <span class="blank"></span>
              <?php link_toggle_admin($row['username']) ?>
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

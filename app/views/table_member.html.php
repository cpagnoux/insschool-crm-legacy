<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Adhérents</li>
</ol>

<div class="container">
  <ul class="action-links">
    <li><?php link_add_entity($table) ?></li>
    <li><?php link_send_mail_to_multiple_recipients($table) ?></li>
  </ul>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php table_filter_member() ?>
    <?php table_display_options('member') ?>

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
          <td><?php link_entity('member', $row['member_id']) ?></td>
        </tr>
      <?php endwhile ?>
    </table>

    <?php table_pagination($table, $page, $filter) ?>
  <?php elseif (row_count($table) != 0): ?>
    <?php table_filter_member() ?>
  <?php else: ?>
    <p>Aucun adhérent</p>
  <?php endif ?>
</div>

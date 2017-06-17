<!-- vim: set et: -->

<div class="container">
  <h1>Inscrits</h1>

  <div class="filters">
    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;table=lesson&amp;id=<?php echo $lesson_id ?>" method="post">
      <div class="filter">
        <?php select_season($season, true) ?>
      </div>
    </form>
  </div>

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
      <li><button class="button" onclick="toggleContent('call_sheet_form')">Éditer une feuille d'appel</button></li>
    </ul>

    <div class="hidden" id="call_sheet_form">
      <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=generate_pdf&amp;document=call_sheet&amp;lesson_id=<?php echo $lesson_id ?>" method="post" target="_blank">
        <input type="hidden" name="season" value="<?php echo $season ?>">

        <?php require 'app/views/radio_quarter.html.php' ?>

        <div class="form-group">
          <input type="submit" value="OK">
        </div>
      </form>
    </div>
  <?php else: ?>
    <p>Aucun inscrit</p>
  <?php endif ?>
</div>

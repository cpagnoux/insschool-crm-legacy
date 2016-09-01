<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('room') ?></li>
  <li><?php echo $row['name'] ?></li>
</ol>

<div class="container">
  <h1><?php echo $row['name'] ?></h1>

  <p>
    <span class="attribute-name">Adresse :</span>
    <?php echo $row['address'] ?><br>
    <span class="attribute-name">Code postal :</span>
    <?php echo $row['postal_code'] ?><br>
    <span class="attribute-name">Ville :</span>
    <?php echo $row['city'] ?>
  </p>

  <ul class="action-links">
    <li><?php link_modify_entity('room', $row['room_id']) ?></li>
    <li><?php link_delete_entity('room', $row['room_id']) ?></li>
  </ul>
</div>

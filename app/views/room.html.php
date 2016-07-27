<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('room') ?> >
  <?php echo $row['name'] ?>
</nav>

<div class="menu">
  <?php link_modify_entity('room', $row['room_id']) ?><br>
  <?php link_delete_entity('room', $row['room_id']) ?>
</div>

<div class="container">
  <h2><?php echo $row['name'] ?></h2>

  <p><b>N° de salle :</b> <?php echo $row['room_id'] ?></p>

  <p><b>Adresse :</b> <?php echo $row['adress'] ?><br>
  <b>Code postal :</b> <?php echo $row['postal_code'] ?><br>
  <b>Ville :</b> <?php echo $row['city'] ?></p>
</div>

<?php navigation_path_on_display('room', $row) ?>

<h2><?php echo $row['name'] ?></h2>

<p><b>N° de salle :</b> <?php echo $row['room_id'] ?></p>

<p><b>Adresse :</b> <?php echo $row['adress'] ?><br>
<b>Code postal :</b> <?php echo $row['postal_code'] ?><br>
<b>Ville :</b> <?php echo $row['city'] ?></p>

<p><?php echo link_modify_entity('room', $row['room_id']) ?>

<?php echo link_delete_entity('room', $row['room_id']) ?></p>

<?php navigation_path_on_display('goody', $row) ?>

<h2><?php echo $row['name'] ?></h2>

<p><b>Référence :</b> <?php echo $row['goody_id'] ?></p>

<p><b>Description :</b> <?php echo $row['description'] ?></p>

<p><b>Prix :</b> <?php echo $row['price'] ?> €<br>
<b>Stock :</b> <?php echo $row['stock'] ?></p>

<p><?php echo link_modify_entity('goody', $row['goody_id']) ?>

<?php echo link_delete_entity('goody', $row['goody_id']) ?></p>

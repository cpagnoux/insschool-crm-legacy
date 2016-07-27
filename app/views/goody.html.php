<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('goody') ?> >
  <?php echo $row['name'] ?>
</nav>

<div class="menu">
  <?php link_modify_entity('goody', $row['goody_id']) ?><br>
  <?php link_delete_entity('goody', $row['goody_id']) ?>
</div>

<div class="container">
  <h2><?php echo $row['name'] ?></h2>

  <p><b>Référence :</b> <?php echo $row['goody_id'] ?></p>

  <p><b>Description :</b> <?php echo $row['description'] ?></p>

  <p><b>Prix :</b> <?php echo $row['price'] ?> €<br>
  <b>Stock :</b> <?php echo $row['stock'] ?></p>
</div>

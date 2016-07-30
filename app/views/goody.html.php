<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('goody') ?> >
  <?php echo $row['name'] ?>
</nav>

<ul class="menu">
  <li><?php link_modify_entity('goody', $row['goody_id']) ?></li>
  <li><?php link_delete_entity('goody', $row['goody_id']) ?></li>
</ul>

<div class="container">
  <h2><?php echo $row['name'] ?></h2>

  <p>
    <b>Description :</b>
    <?php echo $row['description'] ?>
  </p>

  <p>
    <b>Prix :</b>
    <?php echo $row['price'] ?> €<br>
    <b>Stock :</b>
    <?php echo $row['stock'] ?>
  </p>
</div>

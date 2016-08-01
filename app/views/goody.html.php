<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('goody') ?> >
  <?php echo $row['name'] ?>
</nav>

<div class="container">
  <h2><?php echo $row['name'] ?></h2>

  <p>
    <span class="attribute-name">Description :</span><br>
    <?php echo $row['description'] ?>
  </p>

  <p>
    <span class="attribute-name">Prix :</span>
    <?php echo $row['price'] ?> €<br>
    <span class="attribute-name">Stock :</span>
    <?php echo $row['stock'] ?>
  </p>

  <ul class="action-links">
    <li><?php link_modify_entity('goody', $row['goody_id']) ?></li>
    <li><?php link_delete_entity('goody', $row['goody_id']) ?></li>
  </ul>
</div>

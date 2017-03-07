<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('goody') ?></li>
  <li><?php echo $row['name'] ?></li>
</ol>

<div class="container">
  <h1><?php echo $row['name'] ?></h1>

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

  <p>
    <span class="attribute-name">Quantité vendue :</span>
    <?php echo goodies_sold($row['goody_id'], current_season()) ?><br>
    <span class="attribute-name">Somme vendue :</span>
    <?php echo earnings_from_goody($row['goody_id'], current_season()) ?> €
  </p>

  <ul class="action-links">
    <li><?php link_modify_entity('goody', $row['goody_id']) ?></li>
    <li><?php link_delete_entity('goody', $row['goody_id']) ?></li>
  </ul>
</div>

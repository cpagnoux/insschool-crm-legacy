<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('room') ?> >
  <?php echo $row['name'] ?>
</nav>

<ul class="menu">
  <li><?php link_modify_entity('room', $row['room_id']) ?></li>
  <li><?php link_delete_entity('room', $row['room_id']) ?></li>
</ul>

<div class="container">
  <h2><?php echo $row['name'] ?></h2>

  <p>
    <span class="attribute-name">Adresse :</span>
    <?php echo $row['address'] ?><br>
    <span class="attribute-name">Code postal :</span>
    <?php echo $row['postal_code'] ?><br>
    <span class="attribute-name">Ville :</span>
    <?php echo $row['city'] ?>
  </p>
</div>

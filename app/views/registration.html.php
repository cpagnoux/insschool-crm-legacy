<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $row['member_id'], $name) ?> >
  Inscription <?php echo $row['season'] ?>
</nav>

<div class="menu">
  <?php link_modify_entity('registration', $row['registration_id']) ?><br>
  <?php link_delete_entity('registration', $row['registration_id']) ?>
</div>

<div class="container">
  <h2>Inscription <?php echo $row['season'] ?></h2>

  <p><b>N° d'inscription :</b> <?php echo $row['registration_id'] ?><br>
  <b>Adhérent :</b> <?php echo get_name('member', $row['member_id']) ?></p>

  <p><b>Formule :</b> <?php echo registration_formula($row['registration_id']) ?> cours<br>
  <b>Tarif :</b> <?php echo $row['price'] ?> €<br>
  <b>Réduction :</b> <?php echo $row['discount'] ?> %<br>
  <b>Tarif après réduction :</b> <?php echo price_after_discount($row['price'], $row['discount']) ?> €<br>
  <b>Nombre de paiements :</b> <?php echo $row['num_payments'] ?></p>
</div>

<?php display_registration_file($link, $row['registration_id']) ?>

<?php display_registration_detail($link, $row['registration_id']) ?>

<?php display_entity_payments($link, 'registration', $row['registration_id']) ?>

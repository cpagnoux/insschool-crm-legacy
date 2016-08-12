<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php link_entity('member', $row['member_id'], $name) ?> &gt;
  Inscription <?php echo $row['season'] ?>
</nav>

<div class="container">
  <h2>Inscription <?php echo $row['season'] ?></h2>

  <p>
    <span class="attribute-name">Adhérent :</span>
    <?php echo link_entity('member', $row['member_id'], $name) ?>
  </p>

  <p>
    <span class="attribute-name">Formule :</span>
    <?php echo registration_formula($row['registration_id']) ?> cours<br>
    <span class="attribute-name">Forfait :</span>
    <?php echo eval_enum($row['plan']) ?><br>
    <span class="attribute-name">Tarif :</span>
    <?php echo $row['price'] ?> €<br>
    <span class="attribute-name">Réduction :</span>
    <?php echo $row['discount'] ?> %<br>
    <span class="attribute-name">Tarif après réduction :</span>
    <?php echo price_after_discount($row['price'], $row['discount']) ?> €<br>
    <span class="attribute-name">Nombre de paiements :</span>
    <?php echo $row['num_payments'] ?>
  </p>

  <p>
    <span class="attribute-name">Date d'inscription :</span>
    <?php echo format_date($row['date']) ?>
  </p>

  <ul class="action-links">
    <li><?php link_modify_entity('registration', $row['registration_id']) ?></li>
    <li><?php link_delete_entity('registration', $row['registration_id']) ?></li>
  </ul>
</div>

<?php display_registration_file($link, $row['registration_id']) ?>

<?php display_registration_detail($link, $row['registration_id']) ?>

<?php display_entity_payments($link, 'registration', $row['registration_id']) ?>

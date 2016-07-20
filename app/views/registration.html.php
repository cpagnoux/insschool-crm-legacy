<?php navigation_path_on_display('registration', $row) ?>

<h2>Inscription <?php echo $row['season'] ?></h2>

<p><b>N° d'inscription :</b> <?php echo $row['registration_id'] ?><br>
<b>Adhérent :</b> <?php echo get_name('member', $row['member_id']) ?></p>

<p><b>Formule :</b> <?php echo registration_formula($row['registration_id']) ?> cours<br>
<b>Tarif :</b> <?php echo $row['price'] ?> €<br>
<b>Réduction :</b> <?php echo $row['discount'] ?> %<br>
<b>Tarif après réduction :</b> <?php echo price_after_discount($row['price'], $row['discount']) ?> €<br>
<b>Nombre de paiements :</b> <?php echo $row['num_payments'] ?></p>

<p><?php echo link_modify_entity('registration', $row['registration_id']) ?>

<?php echo link_delete_entity('registration', $row['registration_id']) ?></p>

<?php display_registration_file($link, $row['registration_id']) ?>

<?php display_registration_detail($link, $row['registration_id']) ?>

<?php display_entity_payments($link, 'registration', $row['registration_id']) ?>

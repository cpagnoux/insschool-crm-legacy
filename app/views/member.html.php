<nav>
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?>
</nav>

<h2>Information adhérent</h2>

<p><b>N° d'adhérent :</b> <?php echo $row['member_id'] ?></p>

<p><b>Nom :</b> <?php echo $row['last_name'] ?><br>
<b>Prénom :</b> <?php echo $row['first_name'] ?><br>
<b>Date de naissance :</b> <?php echo $row['birth_date'] ?></p>

<p><b>Adresse :</b> <?php echo $row['adress'] ?><br>
<b>Code postal :</b> <?php echo $row['postal_code'] ?><br>
<b>Ville :</b> <?php echo $row['city'] ?></p>

<p><b>Portable :</b> <?php echo $row['cellphone'] ?><br>
<b>Portable père :</b> <?php echo $row['cellphone_father'] ?><br>
<b>Portable mère :</b> <?php echo $row['cellphone_mother'] ?><br>
<b>Fixe :</b> <?php echo $row['phone'] ?><br>
<b>Email :</b> <?php echo $row['email'] ?></p>

<p><b>A connu INS School grâce à :</b> <?php echo eval_enum($row['means_of_knowledge']) ?></p>

<p><b>Bénévole :</b> <?php echo eval_boolean($row['volunteer']) ?></p>

<div>
  <?php link_modify_entity('member', $row['member_id']) ?>
  <?php link_delete_entity('member', $row['member_id']) ?>
</div>

<?php display_member_registrations($link, $row['member_id']) ?>

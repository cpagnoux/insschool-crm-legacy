<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('pre_registration') ?> >
  <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?>
</nav>

<div class="menu">
  <?php link_commit_pre_registration($row['pre_registration_id']) ?><br>
  <?php link_modify_entity('pre_registration', $row['pre_registration_id']) ?><br>
  <?php link_delete_entity('pre_registration', $row['pre_registration_id']) ?>
</div>

<div class="container">
  <h2>Détail pré-inscription</h2>

  <p><b>N° de pré-inscription :</b> <?php echo $row['pre_registration_id'] ?></p>

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

  <p><b>Cours choisi(s) :</b> <?php echo chosen_lessons($row['lessons']) ?></p>

  <p><b>A connu INS School grâce à :</b> <?php echo eval_enum($row['means_of_knowledge']) ?></p>

  <p><b>Date :</b> <?php echo $row['date'] ?></p>
</div>

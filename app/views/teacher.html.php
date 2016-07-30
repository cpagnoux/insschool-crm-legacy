<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('teacher') ?> >
  <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?>
</nav>

<ul class="menu">
  <li><?php link_modify_entity('teacher', $row['teacher_id']) ?></li>
  <li><?php link_delete_entity('teacher', $row['teacher_id']) ?></li>
</ul>

<div class="container">
  <h2><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></h2>

  <p><b>Identifiant :</b> <?php echo $row['teacher_id'] ?></p>

  <p><b>Nom :</b> <?php echo $row['last_name'] ?><br>
  <b>Prénom :</b> <?php echo $row['first_name'] ?><br>
  <b>Date de naissance :</b> <?php echo $row['birth_date'] ?></p>

  <p><b>Adresse :</b> <?php echo $row['adress'] ?><br>
  <b>Code postal :</b> <?php echo $row['postal_code'] ?><br>
  <b>Ville :</b> <?php echo $row['city'] ?></p>

  <p><b>Portable :</b> <?php echo $row['cellphone'] ?><br>
  <b>Fixe :</b> <?php echo $row['phone'] ?><br>
  <b>Email :</b> <?php echo $row['email'] ?></p>

  <p><b>Absences :</b> <?php echo $row['absences'] ?></p>
</div>

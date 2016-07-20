<?php navigation_path_on_display('teacher', $row) ?>

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

<p><?php echo link_modify_entity('teacher', $row['teacher_id']) ?>

<?php echo link_delete_entity('teacher', $row['teacher_id']) ?></p>

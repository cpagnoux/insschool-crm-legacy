<h2>Récapitulatif :</h2>

<p><b>Nom :</b> <?php echo $data['last_name'] ?><br>
<b>Prénom :</b> <?php echo $data['first_name'] ?><br>
<b>Date de naissance :</b> <?php echo $data['birth_date'] ?></p>

<p><b>Adresse :</b> <?php echo $data['adress'] ?><br>
<b>Code postal :</b> <?php echo $data['postal_code'] ?><br>
<b>Ville :</b> <?php echo $data['city'] ?></p>

<p><b>Portable :</b> <?php echo $data['cellphone'] ?><br>
<b>Portable père :</b> <?php echo $data['cellphone_father'] ?><br>
<b>Portable mère :</b> <?php echo $data['cellphone_mother'] ?><br>
<b>Téléphone fixe :</b> <?php echo $data['phone'] ?><br>
<b>E-mail :</b> <?php echo $data['email'] ?></p>

<p>Vous avez choisi les cours :</p>
<ul>

<?php $lessons_str = lessons_to_string($data, true) ?>

</ul>

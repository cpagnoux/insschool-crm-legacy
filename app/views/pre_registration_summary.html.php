<div class="container">
  <h2>Récapitulatif :</h2>

  <p>
    <span class="attribute-name">Nom :</span>
    <?php echo $data['last_name'] ?><br>
    <span class="attribute-name">Prénom :</span>
    <?php echo $data['first_name'] ?><br>
    <span class="attribute-name">Date de naissance :</span>
    <?php echo format_date($data['birth_date']) ?>
  </p>

  <p>
    <span class="attribute-name">Adresse :</span>
    <?php echo $data['address'] ?><br>
    <span class="attribute-name">Code postal :</span>
    <?php echo $data['postal_code'] ?><br>
    <span class="attribute-name">Ville :</span>
    <?php echo $data['city'] ?>
  </p>

  <p>
    <span class="attribute-name">Portable :</span>
    <?php echo $data['cellphone'] ?><br>
    <span class="attribute-name">Portable père :</span>
    <?php echo $data['cellphone_father'] ?><br>
    <span class="attribute-name">Portable mère :</span>
    <?php echo $data['cellphone_mother'] ?><br>
    <span class="attribute-name">Téléphone fixe :</span>
    <?php echo $data['phone'] ?><br>
    <span class="attribute-name">E-mail :</span>
    <?php echo $data['email'] ?>
  </p>

  <p>Vous avez choisi les cours :</p>
  <ul>
    <?php $lessons_str = lessons_to_string($data, true) ?>
  </ul>
</div>

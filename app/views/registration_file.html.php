<?php if (mysqli_num_rows($result) != 0): ?>
  <?php $row = mysqli_fetch_assoc($result) ?>

  <ul class="menu">
    <li><?php link_modify_entity('registration_file', $row['registration_id']) ?></li>
  </ul>
<?php endif ?>

<div class="container">
  <h2>Dossier</h2>

  <?php if (mysqli_num_rows($result) == 0): ?>
      <p>Erreur : aucun dossier</p>
    </div>

    <?php return ?>
  <?php endif ?>

  <p>
    <span class="attribute-name">Certificat médical :</span>
    <?php echo eval_boolean($row['medical_certificate']) ?><br>
    <span class="attribute-name">Assurance :</span>
    <?php echo eval_boolean($row['insurance']) ?><br>
    <span class="attribute-name">Photo :</span>
    <?php echo eval_boolean($row['photo']) ?>
  </p>

  <p>
    <span class="attribute-name">Dossier complet :</span>
    <?php echo eval_boolean(registration_file_complete($row['registration_id'])) ?>
  </p>
</div>

<?php if (mysqli_num_rows($result) != 0): ?>
  <?php $row = mysqli_fetch_assoc($result) ?>
  <div class="menu">
    <?php link_modify_entity('registration_file', $row['registration_id']) ?>
  </div>
<?php endif ?>

<div class="container">
  <h2>Dossier</h2>

  <?php if (mysqli_num_rows($result) == 0): ?>
      <p>Erreur : aucun dossier</p>
    </div>
    <?php return ?>
  <?php endif ?>

  <p><b>Certificat médical :</b> <?php echo eval_boolean($row['medical_certificate']) ?><br>
  <b>Assurance :</b> <?php echo eval_boolean($row['insurance']) ?><br>
  <b>Photo :</b> <?php echo eval_boolean($row['photo']) ?></p>

  <p><b>Dossier complet :</b> <?php echo eval_boolean(registration_file_complete($row['registration_id'])) ?></p>
</div>

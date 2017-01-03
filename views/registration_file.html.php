<!-- vim: set et: -->

<div class="container">
  <h1>Dossier</h1>

  <?php if (mysqli_num_rows($result) != 0): ?>
    <?php $row = mysqli_fetch_assoc($result) ?>

    <p>
      <span class="attribute-name">Certificat médical :</span>
      <?php echo eval_boolean($row['medical_certificate']) ?><br>
      <span class="attribute-name">Assurance :</span>
      <?php echo eval_boolean($row['insurance']) ?><br>
      <span class="attribute-name">Photo :</span>
      <?php echo eval_boolean($row['photo']) ?><br>
      <span class="attribute-name">Enveloppe timbrée :</span>
      <?php echo eval_boolean($row['stamped_envelope']) ?>
    </p>

    <p>
      <span class="attribute-name">Dossier complet :</span>
      <?php echo eval_boolean(registration_file_complete($row['registration_id'])) ?>
    </p>

    <ul class="action-links">
      <li><?php link_modify_entity('registration_file', $row['registration_id']) ?></li>
    </ul>
  <?php else: ?>
    <p>Erreur : aucun dossier</p>
  <?php endif ?>
</div>

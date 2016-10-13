<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $member_id, $name) ?></li>
  <li><?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?></li>
  <li>Modifier le dossier</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=modify&amp;table=registration_file&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <input type="hidden" name="registration_id" value="<?php echo $registration_id ?>">

    <fieldset>
      <?php radio_medical_certificate($row['medical_certificate']) ?>
      <?php radio_insurance($row['insurance']) ?>
      <?php radio_photo($row['photo']) ?>
      <?php radio_stamped_envelope($row['stamped_envelope']) ?>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

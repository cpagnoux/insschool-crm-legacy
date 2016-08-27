<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php link_entity('member', $member_id, $name) ?> &gt;
  <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> &gt;
  Modifier le dossier
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=modify&amp;table=registration_file&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <input type="hidden" name="registration_id" value="<?php echo $registration_id ?>">

    <fieldset>
      <?php radio_medical_certificate($row['medical_certificate']) ?>
      <?php radio_insurance($row['insurance']) ?>
      <?php radio_photo($row['photo']) ?>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

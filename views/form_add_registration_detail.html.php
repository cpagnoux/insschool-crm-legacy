<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $member_id, $name) ?></li>
  <li><?php link_entity('registration', $registration_id, 'Inscription ' . $season) ?></li>
  <li>Ajouter un cours</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=registration_detail" method="post">
    <input type="hidden" name="registration_id" value="<?php echo $registration_id ?>">

    <fieldset>
      <?php select_lesson() ?>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

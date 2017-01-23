<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $row['member_id'], $name) ?></li>
  <li><?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?></li>
  <li>Modifier l'inscription</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=modify&amp;table=registration&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <?php require 'app/views/form_content_registration.html.php' ?>
  </form>
</div>

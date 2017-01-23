<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('pre_registration') ?></li>
  <li><?php link_entity('pre_registration', $row['pre_registration_id'], $name) ?></li>
  <li>Modifier la pré-inscription</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=modify&amp;table=pre_registration&amp;id=<?php echo $row['pre_registration_id'] ?>" method="post">
    <?php require 'app/views/form_content_pre_registration.html.php' ?>
  </form>
</div>

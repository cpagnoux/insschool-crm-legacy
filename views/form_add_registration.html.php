<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $member_id, $name) ?></li>
  <li>Nouvelle inscription</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=registration" method="post">
    <?php require 'views/form_content_registration.html.php' ?>
  </form>
</div>

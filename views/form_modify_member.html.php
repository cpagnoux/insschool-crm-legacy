<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php link_entity('member', $row['member_id'], $name) ?></li>
  <li>Modifier l'adhérent</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=modify&amp;table=member&amp;id=<?php echo $row['member_id'] ?>" method="post">
    <?php require 'views/form_content_member.html.php' ?>
  </form>
</div>

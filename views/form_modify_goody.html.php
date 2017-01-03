<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('goody') ?></li>
  <li><?php link_entity('goody', $row['goody_id'], $name) ?></li>
  <li>Modifier le goodies</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=modify&amp;table=goody&amp;id=<?php echo $row['goody_id'] ?>" method="post">
    <?php require 'views/form_content_goody.html.php' ?>
  </form>
</div>

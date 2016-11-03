<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('goody') ?></li>
  <li>Nouveau goodies</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=goody" method="post">
    <?php require 'views/form_content_goody.html.php' ?>
  </form>
</div>

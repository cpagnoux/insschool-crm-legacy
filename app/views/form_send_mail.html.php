<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table($_GET['table']) ?></li>
  <li><?php link_entity($_GET['table'], $_GET['id'], get_name($_GET['table'], $_GET['id'])) ?></li>
  <li>Envoyer un mail</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <input type="hidden" name="table" value="<?php echo $_GET['table'] ?>">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <?php require 'app/views/form_content_send_mail.html.php' ?>
  </form>
</div>

<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table($_GET['table']) ?></li>
  <li>Envoyer un mail</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=send_mail&amp;to=multiple_recipients" method="post">
    <input type="hidden" name="table" value="<?php echo $_GET['table'] ?>">
    <?php require 'app/views/form_content_send_mail.html.php' ?>
  </form>
</div>

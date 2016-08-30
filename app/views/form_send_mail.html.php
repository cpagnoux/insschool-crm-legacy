<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table($_GET['table']) ?></li>
  <li><?php link_entity($_GET['table'], $_GET['id'], get_name($_GET['table'], $_GET['id'])) ?></li>
  <li>Envoyer un mail</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=send_mail&amp;to=single_recipient" method="post">
    <input type="hidden" name="table" value="<?php echo $_GET['table'] ?>">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
    <?php require 'views/form_content_send_mail.html.php' ?>
  </form>
</div>

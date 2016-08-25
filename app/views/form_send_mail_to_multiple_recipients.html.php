<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table($_GET['table']) ?> &gt;
  Envoyer un mail
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=send_mail&amp;to=multiple_recipients" method="post">
    <input type="hidden" name="table" value="<?php echo $_GET['table'] ?>">
    <?php require 'views/form_content_send_mail.html.php' ?>
  </form>
</div>

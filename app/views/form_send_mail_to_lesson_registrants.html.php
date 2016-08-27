<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('lesson') ?> &gt;
  <?php link_entity('lesson', $_GET['lesson_id'], get_lesson_title($_GET['lesson_id'])) ?> &gt;
  Envoyer un mail aux inscrits
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=send_mail&amp;to=lesson_registrants" method="post">
    <input type="hidden" name="lesson_id" value="<?php echo $_GET['lesson_id'] ?>">
    <input type="hidden" name="season" value="<?php echo $_GET['season'] ?>">
    <?php require 'views/form_content_send_mail.html.php' ?>
  </form>
</div>

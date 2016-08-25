<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('lesson') ?> &gt;
  <?php link_entity('lesson', $_GET['lesson_id'], get_lesson_title($_GET['lesson_id'])) ?> &gt;
  Envoi de mail
</nav>

<?php require 'views/status_content_send_mail.html.php' ?>

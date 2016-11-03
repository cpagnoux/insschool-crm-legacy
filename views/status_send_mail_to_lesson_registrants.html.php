<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('lesson') ?></li>
  <li><?php link_entity('lesson', $_GET['lesson_id'], get_lesson_title($_GET['lesson_id'])) ?></li>
  <li>Envoi de mail</li>
</ol>

<?php require 'views/status_content_send_mail.html.php' ?>

<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('lesson') ?></li>
  <li><?php link_entity('lesson', $_GET['lesson_id'], get_lesson_title($_GET['lesson_id'])) ?></li>
  <li>Envoyer un mail aux inscrits</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?to=lesson_registrants" method="post">
    <input type="hidden" name="lesson_id" value="<?php echo $_GET['lesson_id'] ?>">
    <input type="hidden" name="season" value="<?php echo $_GET['season'] ?>">
    <?php require 'app/views/form_content_send_mail.html.php' ?>
  </form>
</div>

<!-- vim: set et: -->

<div class="container">
  <p><?php link_website() ?></p>

  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <?php require 'app/views/form_content_pre_registration.html.php' ?>
  </form>
</div>

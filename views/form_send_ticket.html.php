<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Assistance</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
    <fieldset>
      <?php require 'views/select_subject.html.php' ?>

      <div class="form-group">
        <textarea class="message" name="message" placeholder="Veuillez décrire le problème que vous rencontrez" required></textarea>
        <span></span>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <input type="submit" name="submit" value="Soumettre la requête">
      </div>
    </fieldset>
  </form>
</div>

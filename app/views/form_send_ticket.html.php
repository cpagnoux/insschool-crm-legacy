<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Assistance</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=send_ticket" method="post">
    <fieldset>
      <?php require 'views/select_subject.html.php' ?>

      <div class="form-row">
        <label for="message">Veuillez décrire le problème que vous rencontrez :</label><br>
        <textarea class="message" id="message" name="message" required></textarea>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Soumettre la requête">
      </div>
    </fieldset>
  </form>
</div>

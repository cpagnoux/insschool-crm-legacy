<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table($_GET['table']) ?> &gt;
  <?php link_entity($_GET['table'], $_GET['id'], get_name($_GET['table'], $_GET['id'])) ?> &gt;
  Envoi de mail
</nav>

<?php if ($_GET['status'] == 'undefined_email'): ?>
  <div class="container">
    <p>Aucune adresse email n'a été enregistrée pour le destinataire</p>
  </div>
<?php else: ?>
  <?php require 'views/status_content_send_mail.html.php' ?>
<?php endif ?>

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li>Assistance</li>
</ol>

<div class="container">
  <?php if ($_GET['status'] == 'success'): ?>
    <p>Requête envoyée avec succès !</p>
  <?php else: ?>
    <p>L'envoi de la requête a échoué.</p>
  <?php endif ?>
</div>

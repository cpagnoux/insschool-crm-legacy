<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php link_entity('member', $member_id, $name) ?> &gt;
  <?php link_entity('registration', $row['registration_id'], 'Inscription ' . $season) ?> &gt;
  Modifier le dossier
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=registration_file&amp;id=<?php echo $row['registration_id'] ?>" method="post">
    <?php require 'views/form_content_registration_file.html.php' ?>
  </form>
</div>

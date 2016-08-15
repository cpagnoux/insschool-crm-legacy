<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('pre_registration') ?> &gt;
  <?php link_entity('pre_registration', $row['pre_registration_id'], $name) ?> &gt;
  Modifier la pré-inscription
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=pre_registration&amp;id=<?php echo $row['pre_registration_id'] ?>" method="post">
    <?php require 'views/form_content_pre_registration.html.php' ?>
  </form>
</div>

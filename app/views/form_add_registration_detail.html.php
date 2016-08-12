<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php link_entity('member', $member_id, $name) ?> &gt;
  <?php link_entity('registration', $registration_id, 'Inscription ' . $season) ?> &gt;
  Ajouter un cours
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=registration_detail" method="post">
    <?php require 'views/form_content_registration_detail.html.php' ?>
  </form>
</div>

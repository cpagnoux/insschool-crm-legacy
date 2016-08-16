<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php link_entity('member', $member_id, $name) ?> &gt;
  Nouvelle inscription
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=registration" method="post">
    <?php require 'views/form_content_registration.html.php' ?>
  </form>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  Nouvel adhérent
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=member" method="post">
    <?php require 'views/form_content_member.html.php' ?>
  </form>
</div>

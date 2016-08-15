<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php link_entity('member', $row['member_id'], $name) ?> &gt;
  Modifier l'adhérent
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=modify&amp;table=member&amp;id=<?php echo $row['member_id'] ?>" method="post">
    <?php require 'views/form_content_member.html.php' ?>
  </form>
</div>

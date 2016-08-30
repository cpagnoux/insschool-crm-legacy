<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li>Nouvel adhérent</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=member" method="post">
    <?php require 'views/form_content_member.html.php' ?>
  </form>
</div>

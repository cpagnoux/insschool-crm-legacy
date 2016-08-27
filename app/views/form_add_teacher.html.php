<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('teacher') ?> &gt;
  Nouveau professeur
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=teacher" method="post">
    <?php require 'views/form_content_teacher.html.php' ?>
  </form>
</div>

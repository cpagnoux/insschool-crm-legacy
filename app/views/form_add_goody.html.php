<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('goody') ?> >
  Nouveau goodies
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=goody" method="post">
    <?php require 'views/form_content_goody.html.php' ?>
  </form>
</div>

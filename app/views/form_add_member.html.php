<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  Nouvel adhérent
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=member" method="post">
    <?php form_entity_member() ?>
  </form>
</div>

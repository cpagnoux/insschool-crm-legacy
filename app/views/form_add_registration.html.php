<?php $name = get_name('member', $id) ?>

<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('member') ?> >
  <?php link_entity('member', $id, $name) ?> >
  Nouvelle inscription
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=registration" method="post">
    <?php require 'views/form_content_registration.html.php' ?>
  </form>
</div>

<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('order') ?> &gt;
  Nouvelle commande
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=add&amp;table=order" method="post">
    <fieldset>
      <?php select_member() ?>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

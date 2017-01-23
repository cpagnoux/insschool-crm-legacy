<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('order') ?></li>
  <li>Nouvelle commande</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?controller=entity&amp;action=add&amp;table=order" method="post">
    <fieldset>
      <?php select_member() ?>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

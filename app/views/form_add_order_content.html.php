<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('order') ?> &gt;
  <?php link_entity('order', $order_id, 'N° ' . $order_id) ?> &gt;
  Ajouter un article
</nav>

<div class="container">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>?mode=add&amp;table=order_content" method="post">
    <input type="hidden" name="order_id" value="<?php echo $order_id ?>">

    <fieldset>
      <?php select_goody() ?>

      <div class="form-row">
        <label for="quantity">Quantité <sup>*</sup> :</label><br>
        <input id="quantity" type="text" name="quantity" required="required">
      </div>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

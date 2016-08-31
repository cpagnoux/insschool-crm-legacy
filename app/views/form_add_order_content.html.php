<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('order') ?></li>
  <li><?php link_entity('order', $order_id, 'N° ' . $order_id) ?></li>
  <li>Ajouter un article</li>
</ol>

<div class="container">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?action=add&amp;table=order_content" method="post">
    <input type="hidden" name="order_id" value="<?php echo $order_id ?>">

    <fieldset>
      <?php select_goody() ?>

      <div class="form-row">
        <label for="quantity">Quantité <sup>*</sup> :</label><br>
        <input id="quantity" type="text" name="quantity" required>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-row">
        <input type="submit" name="submit" value="Valider">
      </div>
    </fieldset>
  </form>
</div>

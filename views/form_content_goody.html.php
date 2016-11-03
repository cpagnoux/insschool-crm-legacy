<!-- vim: set expandtab: -->

<fieldset>
  <div class="form-group">
    <label for="name">Désignation</label>
    <input id="name" type="text" name="name" value="<?php echo $row['name'] ?>" required autofocus>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description"><?php echo $row['description'] ?></textarea>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <label for="price">Prix</label>
    <input id="price" type="text" name="price" value="<?php echo $row['price'] ?>" <?php regexp_decimal() ?>> €
    <span></span>
  </div>

  <div class="form-group">
    <label for="stock">Stock</label>
    <input id="stock" type="number" name="stock" value="<?php echo $row['stock'] ?>" min="1">
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-group">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

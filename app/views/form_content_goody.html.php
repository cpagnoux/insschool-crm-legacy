<fieldset>
  <div class="form-row">
    <label for="name">Désignation</label><br>
    <input id="name" type="text" name="name" value="<?php echo $row['name'] ?>" required>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="description">Description</label><br>
    <textarea id="description" name="description"><?php echo $row['description'] ?></textarea>
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="price">Prix</label><br>
    <input id="price" type="text" name="price" value="<?php echo $row['price'] ?>"> €
    <span></span>
  </div>

  <div class="form-row">
    <label for="stock">Stock</label><br>
    <input id="stock" type="text" name="stock" value="<?php echo $row['stock'] ?>">
    <span></span>
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

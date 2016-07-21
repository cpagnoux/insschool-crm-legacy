<p>N° de commande : <input type="text" name="order_id" value="<?php echo $order_id ?>" readonly="readonly"></p>

<p><?php select_goody() ?>
Quantité <sup>*</sup> : <input type="text" name="quantity" required="required"></p>

<p><input type="submit" name="submit" value="Valider"></p>

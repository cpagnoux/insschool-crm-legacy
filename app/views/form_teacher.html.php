<p>Nom <sup>*</sup> : <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" required="required"><br>
Prénom <sup>*</sup> : <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required="required"><br>
Date de naissance : <input type="text" name="birth_date" value="<?php echo $row['birth_date'] ?>"></p>

<p>Adresse : <input type="text" name="adress" value="<?php echo $row['adress'] ?>"><br>
Code postal : <input type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>"><br>
Ville : <input type="text" name="city" value="<?php echo $row['city'] ?>"><br>

Portable : <input type="text" name="cellphone" value="<?php echo $row['cellphone'] ?>"><br>
Fixe : <input type="text" name="phone" value="<?php echo $row['phone'] ?>"><br>
Email : <input type="email" name="email" value="<?php echo $row['email'] ?>"></p>

<p><input type="submit" name="submit" value="Valider"></p>

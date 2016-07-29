<p>Nom <sup>*</sup> : <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" required="required"><br>
Prénom <sup>*</sup> : <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required="required"><br>
Date de naissance <sup>*</sup> : <input type="text" name="birth_date" value="<?php echo $row['birth_date'] ?>" required="required"> (AAAA-MM-JJ)</p>

<p>Adresse <sup>*</sup> : <input type="text" name="adress" value="<?php echo $row['adress'] ?>" required="required"><br>
Code postal <sup>*</sup> : <input type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>" required="required"><br>
Ville <sup>*</sup> : <input type="text" name="city" value="<?php echo $row['city'] ?>" required="required"></p>

<p>Portable élève : <input type="text" name="cellphone" value="<?php echo $row['cellphone'] ?>"><br>
Portable père : <input type="text" name="cellphone_father" value="<?php echo $row['cellphone_father'] ?>"><br>
Portable mère : <input type="text" name="cellphone_mother" value="<?php echo $row['cellphone_mother'] ?>"><br>
Téléphone fixe : <input type="text" name="phone" value="<?php echo $row['phone'] ?>"><br>
E-mail : <input type="email" name="email" value="<?php echo $row['email'] ?>"></p>

<h2>Cours suivi(s)</h2>

<?php display_lessons($lessons) ?>

<?php if (!isset($row)): ?>
  <p>* Attention : Lors des cours à INS School, merci d'utiliser des chaussures propres dans les salles de danse (non utilisées à l'extérieur) et une tenue confortable.<br>
  * INS School se réserve le droit de modifier les horaires du planning à tout moment.</p>
<?php endif ?>

<?php if (isset($row)): ?>
  <p>A connu INS School grâce à : <sup>*</sup><br>
<?php else: ?>
  <p>Comment nous avez-vous connus ? <sup>*</sup><br>
<?php endif ?>

<input type="radio" name="means_of_knowledge" value="POSTER_FLYER" required="required"<?php echo $means_of_knowledge_poster_flyer ?>> Affiches, Flyers<br>
<input type="radio" name="means_of_knowledge" value="INTERNET"<?php echo $means_of_knowledge_internet ?>> Internet<br>
<input type="radio" name="means_of_knowledge" value="WORD_OF_MOUTH"<?php echo $means_of_knowledge_word_of_mouth ?>> Bouche-à-oreille</p>

<?php if (!isset($row)): ?>
  <p>Documents à fournir :</p>
    <ul>
      <li>1 certificat médical</li>
      <li>2 photos d'identité</li>
      <li>1 attestation d'assurance</li>
      <li>1 enveloppe timbrée (au nom et adresse de l'adhérent ou des parents pour les mineurs)</li>
      <li>Le règlement du forfait (possibilité de payer en trois fois sans frais)</li>
    </ul>
  <p>Le règlement intérieur doit être signé et retourné lors de l'inscription.</p>
<?php endif ?>

<p><input type="submit" name="submit" value="Valider"></p>

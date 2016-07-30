<fieldset>
  <div class="form-row">
    <label for="last_name">Nom <sup>*</sup> :</label><br>
    <input id="last_name" type="text" name="last_name" value="<?php echo $row['last_name'] ?>" required="required">
  </div>

  <div class="form-row">
    <label for="first_name">Prénom <sup>*</sup> :</label><br>
    <input id="first_name" type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required="required">
  </div>

  <div class="form-row">
    <label for="birth_date">Date de naissance <sup>*</sup> :</label><br>
    <input id="birth_date" type="text" name="birth_date" value="<?php echo $row['birth_date'] ?>" required="required"> (AAAA-MM-JJ)
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="address">Adresse <sup>*</sup> :</label><br>
    <input id="address" type="text" name="address" value="<?php echo $row['address'] ?>" required="required">
  </div>

  <div class="form-row">
    <label for="postal_code">Code postal <sup>*</sup> :</label><br>
    <input id="postal_code" type="text" name="postal_code" value="<?php echo $row['postal_code'] ?>" required="required">
  </div>

  <div class="form-row">
    <label for="city">Ville <sup>*</sup> :</label><br>
    <input id="city" type="text" name="city" value="<?php echo $row['city'] ?>" required="required">
  </div>
</fieldset>

<fieldset>
  <div class="form-row">
    <label for="cellphone">Portable élève :</label><br>
    <input id="cellphone" type="text" name="cellphone" value="<?php echo $row['cellphone'] ?>">
  </div>

  <div class="form-row">
    <label for="cellphone_father">Portable père :</label><br>
    <input id="cellphone_father" type="text" name="cellphone_father" value="<?php echo $row['cellphone_father'] ?>">
  </div>

  <div class="form-row">
    <label for="cellphone_mother">Portable mère :</label><br>
    <input id="cellphone_mother" type="text" name="cellphone_mother" value="<?php echo $row['cellphone_mother'] ?>">
  </div>

  <div class="form-row">
    <label for="phone">Téléphone fixe :</label><br>
    <input id="phone" type="text" name="phone" value="<?php echo $row['phone'] ?>">
  </div>

  <div class="form-row">
    <label for="email">E-mail :</label><br>
    <input id="email" type="email" name="email" value="<?php echo $row['email'] ?>">
  </div>
</fieldset>

<h2>Cours suivi(s)</h2>

<fieldset>
  <?php display_lessons($lessons) ?>
</fieldset>

<?php if (!isset($row)): ?>
  <p>
    * Attention : Lors des cours à INS School, merci d'utiliser des chaussures propres dans les salles de danse (non utilisées à l'extérieur) et une tenue confortable.<br>
    * INS School se réserve le droit de modifier les horaires du planning à tout moment.
  </p>
<?php endif ?>

<fieldset>
  <div class="form-row">

    <?php if (isset($row)): ?>
      A connu INS School grâce à : <sup>*</sup><br>
    <?php else: ?>
      Comment nous avez-vous connus ? <sup>*</sup><br>
    <?php endif ?>

    <input id="mok_poster_flyer" type="radio" name="means_of_knowledge" value="POSTER_FLYER" required="required"<?php echo $mok_poster_flyer ?>>
    <label for="mok_poster_flyer">Affiches, Flyers</label><br>
    <input id="mok_internet" type="radio" name="means_of_knowledge" value="INTERNET"<?php echo $mok_internet ?>>
    <label for="mok_internet">Internet</label><br>
    <input id="mok_word_of_mouth" type="radio" name="means_of_knowledge" value="WORD_OF_MOUTH"<?php echo $mok_word_of_mouth ?>>
    <label for="mok_word_of_mouth">Bouche-à-oreille</label>
  </div>
</fieldset>

<?php if (!isset($row)): ?>
  <p>Documents à fournir :</p>
    <ul>
      <li>1 certificat médical</li>
      <li>2 photos d'identité</li>
      <li>1 attestation d'assurance</li>
      <li>1 enveloppe timbrée (au nom et addresse de l'adhérent ou des parents pour les mineurs)</li>
      <li>Le règlement du forfait (possibilité de payer en trois fois sans frais)</li>
    </ul>
  <p>Le règlement intérieur doit être signé et retourné lors de l'inscription.</p>
<?php endif ?>

<fieldset>
  <div class="form-row">
    <input type="submit" name="submit" value="Valider">
  </div>
</fieldset>

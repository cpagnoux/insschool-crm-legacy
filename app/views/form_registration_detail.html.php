<p>N° d'inscription : <input type="text" name=registration_id value="<?php echo $registration_id ?>" readonly="readonly"></p>

<p><?php select_lesson() ?>
Participation à l'INS Show <sup>*</sup> : <input type="radio" name="show_participation" value="1" required="required"> Oui <input type="radio" name="show_participation" value="0"> Non</p>

<p><input type="submit" name="submit" value="Valider"></p>

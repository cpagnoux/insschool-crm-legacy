<p>Intitulé <sup>*</sup> : <input type="text" name="title" value="<?php echo $row['title'] ?>" required="required"></p>

<p><?php select_teacher($row['teacher_id']) ?>
<?php select_day($row['day']) ?>
Heure de début <sup>*</sup> : <input type="text" name="start_time" value="<?php echo $row['start_time'] ?>" required="required"> (HH:MM:SS)<br>
Heure de fin <sup>*</sup> : <input type="text" name="end_time" value="<?php echo $row['end_time'] ?>" required="required"> (HH:MM:SS)<br>
<?php select_room($row['room_id']) ?></p>

<p>Costume : <input type="text" name="costume" value="<?php echo $row['costume'] ?>"><br>
T-shirt : <input type="text" name="t_shirt" value="<?php echo $row['t_shirt'] ?>"></p>

<p><input type="submit" name="submit" value="Valider"></p>

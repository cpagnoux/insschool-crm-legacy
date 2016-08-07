<nav class="breadcrumb">
  <?php link_home() ?> >
  <?php link_table('teacher') ?> >
  <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?>
</nav>

<div class="container">
  <h2><?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?></h2>

  <p>
    <span class="attribute-name">Nom :</span>
    <?php echo $row['last_name'] ?><br>
    <span class="attribute-name">Prénom :</span>
    <?php echo $row['first_name'] ?><br>
    <span class="attribute-name">Date de naissance :</span>
    <?php echo format_date($row['birth_date']) ?>
  </p>

  <p>
    <span class="attribute-name">Adresse :</span>
    <?php echo $row['address'] ?><br>
    <span class="attribute-name">Code postal :</span>
    <?php echo $row['postal_code'] ?><br>
    <span class="attribute-name">Ville :</span>
    <?php echo $row['city'] ?>
  </p>

  <p>
    <span class="attribute-name">Portable :</span>
    <?php echo $row['cellphone'] ?><br>
    <span class="attribute-name">Fixe :</span>
    <?php echo $row['phone'] ?><br>
    <span class="attribute-name">Email :</span>
    <?php echo $row['email'] ?>
  </p>

  <p>
    <span class="attribute-name">Absences :</span>
    <?php echo $row['absences'] ?>
    <span class="blank"></span>
    <?php link_update_absences($row['teacher_id']) ?>
  </p>

  <ul class="action-links">
    <li><?php link_modify_entity('teacher', $row['teacher_id']) ?></li>
    <li><?php link_delete_entity('teacher', $row['teacher_id']) ?></li>
  </ul>
</div>

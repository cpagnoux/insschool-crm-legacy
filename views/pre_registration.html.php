<!-- vim: set expandtab: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('pre_registration') ?></li>
  <li><?php echo $row['first_name'] ?> <?php echo strtoupper($row['last_name']) ?></li>
</ol>

<div class="container">
  <h1>Détail pré-inscription</h1>

  <p>
    <span class="attribute-name">Nom :</span>
    <?php echo strtoupper($row['last_name']) ?><br>
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
    <span class="attribute-name">Portable père :</span>
    <?php echo $row['cellphone_father'] ?><br>
    <span class="attribute-name">Portable mère :</span>
    <?php echo $row['cellphone_mother'] ?><br>
    <span class="attribute-name">Fixe :</span>
    <?php echo $row['phone'] ?><br>
    <span class="attribute-name">Email :</span>
    <?php echo $row['email'] ?>
  </p>

  <?php if ($row['with_lessons']): ?>
    <p>
      <span class="attribute-name">Cours choisi(s) :</span>
      <?php echo chosen_lessons($row['lessons']) ?>
    </p>

    <p>
      <span class="attribute-name">Forfait choisi :</span>
      <?php echo eval_enum($row['plan']) ?>
    </p>
  <?php endif ?>

  <p>
    <span class="attribute-name">A connu INS School grâce à :</span>
    <?php echo eval_enum($row['means_of_knowledge']) ?>
  </p>

  <p>
    <span class="attribute-name">Date de pré-inscription :</span>
    <?php echo format_datetime($row['date']) ?>
  </p>

  <ul class="action-links">
    <li><?php link_commit_pre_registration($row['pre_registration_id']) ?></li>
    <li><?php link_modify_entity('pre_registration', $row['pre_registration_id']) ?></li>
    <li><?php link_delete_entity('pre_registration', $row['pre_registration_id']) ?></li>
  </ul>
</div>

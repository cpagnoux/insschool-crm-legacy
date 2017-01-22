<!-- vim: set et: -->

<ol class="breadcrumb">
  <li><?php link_home() ?></li>
  <li><?php link_table('member') ?></li>
  <li><?php echo $row['first_name'] ?> <?php echo strtoupper($row['last_name']) ?></li>
</ol>

<div class="container">
  <h1>Information adhérent</h1>

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

  <p>
    <span class="attribute-name">A connu INS School grâce à :</span>
    <?php echo eval_enum($row['means_of_knowledge']) ?>
  </p>

  <p>
    <span class="attribute-name">Bénévole :</span>
    <?php link_toggle_volunteer($row['member_id'], $row['volunteer']) ?>
  </p>

  <p>
    <span class="attribute-name">Membre depuis le :</span>
    <?php echo format_date($row['creation_date']) ?>
  </p>

  <ul class="action-links">
    <li><?php link_send_mail('member', $row['member_id']) ?></li>
    <li><?php link_modify_entity('member', $row['member_id']) ?></li>
    <li><?php link_delete_entity('member', $row['member_id']) ?></li>
  </ul>
</div>

<?php display_member_registrations($link, $row['member_id']) ?>

<nav class="breadcrumb">
  <?php link_home() ?> &gt;
  <?php link_table('member') ?> &gt;
  <?php echo $row['first_name'] ?> <?php echo $row['last_name'] ?>
</nav>

<div class="container">
  <h2>Information adhérent</h2>

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
    <?php echo eval_boolean($row['volunteer']) ?>
    <span class="blank"></span>
    <?php link_toggle_volunteer($row['member_id']) ?>
  </p>

  <ul class="action-links">
    <li><?php link_send_mail('member', $row['member_id']) ?></li>
    <li><?php link_modify_entity('member', $row['member_id']) ?></li>
    <li><?php link_delete_entity('member', $row['member_id']) ?></li>
  </ul>
</div>

<?php display_member_registrations($link, $row['member_id']) ?>

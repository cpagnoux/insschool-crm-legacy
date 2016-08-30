<div class="filters">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?table=member" method="post">
    <div class="filter">
      <label for="member_filter">Afficher :</label>

      <select id="member_filter" name="member_filter" onchange="this.form.submit()">
        <option value="all"<?php echo $all ?>>Tout</option>
        <option value="unpaid_registration"<?php echo $unpaid_registration ?>>Inscriptions non payées</option>
        <option value="volunteer"<?php echo $volunteer ?>>Bénévoles</option>
      </select>
    </div>

    <?php link_reset_filters('member') ?>
  </form>
</div>

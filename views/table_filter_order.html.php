<!-- vim: set expandtab: -->

<div class="filters">
  <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>?table=order" method="post">
    <div class="filter">
      <label for="order_filter_by_member">Adhérent(s) :</label>

      <select id="order_filter_by_member" name="order_filter_by_member" onchange="this.form.submit()">
        <option value="">Tous</option>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <?php $row = html_encode_strings($row) ?>

          <?php if ($row['member_id'] == $_SESSION['order_filter_by_member']): ?>
            <option value="<?php echo $row['member_id'] ?>" selected><?php echo strtoupper($row['last_name']) ?> <?php echo $row['first_name'] ?></option>
          <?php else: ?>
            <option value="<?php echo $row['member_id'] ?>"><?php echo strtoupper($row['last_name']) ?> <?php echo $row['first_name'] ?></option>
          <?php endif ?>
        <?php endwhile ?>
      </select>
    </div>

    <div class="filter">
      <label for="order_filter">Afficher :</label>

      <select id="order_filter" name="order_filter" onchange="this.form.submit()">
        <option value="all"<?php echo $all ?>>Tout</option>
        <option value="unpaid"<?php echo $unpaid ?>>Non payées</option>
      </select>
    </div>

    <?php link_reset_filters('order') ?>
  </form>
</div>

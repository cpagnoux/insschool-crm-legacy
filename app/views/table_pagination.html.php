<nav class="pagination">

  <?php if ($page > 1): ?>
    <?php link_table_previous($table, $page - 1) ?>
  <?php endif ?>

  <?php echo $page ?>

  <?php if ($page * $_SESSION['limit'] < $num_rows): ?>
    <?php link_table_next($table, $page + 1) ?>
  <?php endif ?>

</nav>

<nav class="pagination">
  <ul>
    <?php if ($page > 1): ?>
      <li><?php link_table_previous($table, $page - 1) ?></li>
    <?php endif ?>

    <li><span class="active"><?php echo $page ?></span></li>

    <?php if ($page * $_SESSION['limit'] < $num_rows): ?>
      <li><?php link_table_next($table, $page + 1) ?></li>
    <?php endif ?>
  </ul>
</nav>

<!-- vim: set et: -->

<nav class="pagination">
  <ul>
    <?php if ($page > 1): ?>
      <li><?php link_previous($table, $page - 1) ?></li>

      <?php for ($i = $page - 5; $i < $page; $i++): ?>
        <?php if ($i > 0): ?>
          <li><?php link_page($table, $i) ?></li>
        <?php endif ?>
      <?php endfor ?>
    <?php else: ?>
      <li><span class="disabled">&laquo;</span></li>
    <?php endif ?>

    <li><span class="active"><?php echo $page ?></span></li>

    <?php if ($page < $num_pages): ?>
      <?php for ($i = $page + 1; $i <= $page + 5; $i++): ?>
        <?php if ($i <= $num_pages): ?>
          <li><?php link_page($table, $i) ?></li>
        <?php endif ?>
      <?php endfor ?>

      <li><?php link_next($table, $page + 1) ?></li>
    <?php else: ?>
      <li><span class="disabled">&raquo;</span></li>
    <?php endif ?>
  </ul>
</nav>

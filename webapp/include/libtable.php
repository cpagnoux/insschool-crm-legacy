<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/util.php';

function display_table_limit($table, $limit)
{
	$limit_25 = '';
	$limit_50 = '';
	$limit_100 = '';

	if (isset($limit)) {
		if ($limit == 25)
			$limit_25 = ' selected="selected"';
		else if ($limit == 50)
			$limit_50 = ' selected="selected"';
		else
			$limit_100 = ' selected="selected"';
	}

	echo '<form action="back-office.php?table=' . $table .
	     '" method="post">' . PHP_EOL;
	echo '  Lignes par page :' . PHP_EOL;
	echo '  <select name="limit" onchange="this.form.submit()">' . PHP_EOL;
	echo '    <option value="25"' . $limit_25 . '>25</option>' . PHP_EOL;
	echo '    <option value="50"' . $limit_50 . '>50</option>' . PHP_EOL;
	echo '    <option value="100"' . $limit_100 . '>100</option>' . PHP_EOL;
	echo '  </select>' . PHP_EOL;
	echo '</form>' . PHP_EOL;
}

function display_table_pagination($table, $limit, $page)
{
	$num_rows = row_count($table);

	echo '<nav>' . PHP_EOL;

	if ($page > 1)
		echo '  ' . link_table_previous($table, $page - 1) . PHP_EOL;

	echo '  ' . $page . PHP_EOL;

	if ($limit * $page < $num_rows)
		echo '  ' . link_table_next($table, $page + 1) . PHP_EOL;

	echo '</nav>' . PHP_EOL;
}
?>

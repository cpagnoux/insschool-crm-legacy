<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include '../webapp/include/config.php';

$command = 'mysql -u ' . USERNAME . ' -p' . PASSWORD . ' ';

echo 'Dropping existing database...' . PHP_EOL;
exec($command . '-e "DROP DATABASE ins_school"');
echo 'Dropping existing user...' . PHP_EOL;
exec($command . '-e "DROP USER insschooladmin"');
echo 'Creating database...' . PHP_EOL;
exec($command . '< ../sql/ins_school.sql');
echo 'Inserting sample member data...' . PHP_EOL;
exec($command . DATABASE . ' < test_member.sql');
echo 'Inserting other sample data...' . PHP_EOL;
exec($command . DATABASE . ' < test_other.sql');
?>

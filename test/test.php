<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

$command = 'mysql -u root -p210713 ';

echo 'Dropping existing database...' . PHP_EOL;
exec($command . '-e "DROP DATABASE insschool"');
echo 'Dropping existing user...' . PHP_EOL;
exec($command . '-e "DROP USER insschooladmin@localhost"');
echo 'Creating database...' . PHP_EOL;
exec($command . '< ../db/insschool.sql');
echo 'Inserting sample member data...' . PHP_EOL;
exec($command . 'insschool < test_member.sql');
echo 'Inserting other sample data...' . PHP_EOL;
exec($command . 'insschool < test_other.sql');
?>

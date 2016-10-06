<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require '../config/app.config.php';

$command = 'mysql -u ' . USERNAME . ' -p' . PASSWORD . ' ';

echo 'Dropping existing database...' . PHP_EOL;
exec($command . '-e "DROP DATABASE ' . DATABASE . '"');
echo 'Creating database...' . PHP_EOL;
exec($command . '-e "CREATE DATABASE ' . DATABASE . '"');
echo 'Creating tables...' . PHP_EOL;
exec($command . DATABASE . ' < ../db/insschool.sql');
echo 'Inserting data...' . PHP_EOL;
exec($command . DATABASE . ' < ../db/data.sql');
echo 'Inserting sample member data...' . PHP_EOL;
exec($command . DATABASE . ' < test_member.sql');
echo 'Inserting other sample data...' . PHP_EOL;
exec($command . DATABASE . ' < test_other.sql');
?>

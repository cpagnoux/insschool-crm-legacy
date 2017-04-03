<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

require '../app/config/app.config.php';

$command = 'mysql -u ' . USERNAME . ' -p' . PASSWORD . ' ';

echo 'Dropping existing database...' . PHP_EOL;
exec($command . '-e "DROP DATABASE ' . DATABASE . '"');
echo 'Creating database...' . PHP_EOL;
exec($command . '-e "CREATE DATABASE ' . DATABASE . '"');
echo 'Creating tables...' . PHP_EOL;
exec($command . DATABASE . ' < ../sql/insschool.sql');
echo 'Inserting data...' . PHP_EOL;
exec($command . DATABASE . ' < ../sql/data.sql');
echo 'Inserting sample member data...' . PHP_EOL;
exec($command . DATABASE . ' < test_member.sql');
echo 'Inserting other sample data...' . PHP_EOL;
exec($command . DATABASE . ' < test_other.sql');

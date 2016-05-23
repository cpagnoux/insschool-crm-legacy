<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include '../webapp/include/connection.php';

$command = 'mysql -u ' . USERNAME . ' -p' . PASSWORD . ' ';

exec($command . '-e "DROP DATABASE ins_school"');
exec($command . '-e "DROP USER insschooladmin"');
exec($command . '< ../sql/ins_school.sql');
exec($command . DATABASE . ' < test_member.sql');
exec($command . DATABASE . ' < test_other.sql');
?>

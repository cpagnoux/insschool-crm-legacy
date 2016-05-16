<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

include_once 'include/libpre-registration.php';
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Pré-inscription - INS SCHOOL</title>

</head>
<body>

<h1>Pré-inscription</h1>

<?php
$action = '';

if (isset($_POST['submit']))
	$action = 'confirm';

switch ($action) {
case 'confirm':
	$lessons = display_summary($_POST);
	insert_into_database($_POST, $lessons);
	break;
default:
	display_pre_registration_form();
	break;
}
?>

</body>
</html>

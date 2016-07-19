<?php
/*
 * Copyright (C) 2015-2016 Christophe Pagnoux-Vieuxfort for INS School
 */

require_once 'include/libpre-registration.php';
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
	$action = 'submit';

switch ($action) {
case 'submit':
	$lessons_str = display_pre_registration_summary($_POST);
	save_pre_registration($_POST, $lessons_str);
	break;
default:
	display_pre_registration_form();
	break;
}
?>

</body>
</html>

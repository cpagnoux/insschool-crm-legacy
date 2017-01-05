<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'config/app.config.php';

require_once 'vendor/fpdf181/fpdf.php';

require_once 'src/bill.php';

require_once 'src/util.php';

function get_member_data($member_id)
{
	$link = connect_database();

	$query = 'SELECT * FROM member WHERE member_id = ' . $member_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($link);

	return $row;
}

function get_registration_detail($registration_id)
{
	$season = get_registration_season($registration_id);

	$link = connect_database();

	$query = 'SELECT lesson.title FROM lesson ' .
		 'INNER JOIN registration_detail ' .
		 'ON registration_detail.lesson_id = lesson.lesson_id ' .
		 'WHERE registration_id = ' . $registration_id;
	if (!$result = mysqli_query($link, $query)) {
		sql_error($link, $query);
		exit;
	}

	$data[] = array(
		'description' => 'SAISON ' . $season,
		'quantity' => '',
		'price' => '',
		'total' => ''
	);

	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = array(
			'description' => $row['title'],
			'quantity' => 1,
			'price' => '',
			'total' => ''
		);
	}

	mysqli_free_result($result);
	mysqli_close($link);

	return $data;
}

function generate_bill($registration_id)
{
	$member_id = get_member_id($registration_id);
	$bill_num = 'FCI' . sprintf('%05d', $registration_id);
	$date = date('d/m/Y');
	$member_code = 'CL' . sprintf('%05d', $member_id);
	$member_data = get_member_data($member_id);
	$registration_detail = get_registration_detail($registration_id);
	$total = registration_price($registration_id);
	$total_paid = total_paid('registration', $registration_id);

	foreach ($member_data as &$value) {
		$value = strtoupper($value);
		$value = utf8_decode($value);
	}

	foreach ($registration_detail as &$row) {
		foreach ($row as &$value)
			$value = utf8_decode($value);
	}

	$bill = new Bill();
	$bill->AliasNbPages();
	$bill->AddPage();
	$bill->SetFillColor(192);
	$bill->PrintBillInfo($bill_num, $date, $member_code);
	$bill->PrintMemberInfo($member_data);
	$bill->PrintBillDetail($registration_detail);
	$bill->PrintBillTotal($total, TVA, $total_paid);
	$bill->Output();
}

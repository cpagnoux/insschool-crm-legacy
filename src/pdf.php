<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'vendor/fpdf181/fpdf.php';

require_once 'src/bill.php';

function generate_bill()
{
	$bill = new Bill();
	$bill->AliasNbPages();
	$bill->AddPage();
	$bill->SetFillColor(192);
	$bill->PrintBillInfo('FC0192', '22/12/2014', 'CL0141');

	$data_member = array(
		'first_name' => 'Madeline',
		'last_name' => 'Sabier',
		'address' => '4 rue du Creux de l\'Enfer',
		'postal_code' => '63000',
		'city' => 'Clermont-Ferrand'
	);

	foreach ($data_member as &$value)
		$value = utf8_decode($value);

	$bill->PrintMemberInfo($data_member);

	$data_bill = array(
		'description' => 'Pilates & Stretching',
		'quantity' => 1,
		'price' => 234.00,
		'total' => 234.00
	);

	foreach ($data_bill as &$value)
		$value = utf8_decode($value);

	$bill->PrintBillContent($data_bill);
	$bill->PrintBillDetail(234.00, 234.00);
	$bill->Output();
}
?>

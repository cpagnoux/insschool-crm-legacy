<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

function generate_bill($registration_id)
{
	$bill = new Bill();
	$bill->LoadData($registration_id);
	$bill->AliasNbPages();
	$bill->AddPage();
	$bill->PrintBill();
	$bill->Output();
}

function generate_call_sheet($lesson_id, $season, $quarter)
{
	$call_sheet = new CallSheet();
	$call_sheet->LoadData($lesson_id, $season, $quarter);
	$call_sheet->AddPage('L');
	$call_sheet->PrintCallSheet();
	$call_sheet->Output();
}

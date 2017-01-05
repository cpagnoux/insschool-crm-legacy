<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'vendor/fpdf181/fpdf.php';

define('FONT', 'Arial');
define('FONT_SIZE_SMALL', 8);
define('FONT_SIZE_NORMAL', 10);
define('FONT_SIZE_BIG', 12);

class Bill extends FPDF
{
	function Header()
	{
		$this->Image(PUBLIC_PATH . '/img/logo-white.jpg', null, null,
			     50);
		$this->Ln(5);

		$this->SetFont(FONT, 'B', FONT_SIZE_NORMAL);
		$this->Cell(50, 5, 'Association INS School', 0, 2);
		$this->SetFont(FONT, '', FONT_SIZE_NORMAL);
		$this->Cell(50, 5, '29 rue Jules Verne', 0, 2);
		$this->Cell(50, 5, '63100 Clermont-Ferrand', 0, 2);
		$this->Cell(50, 5, 'Siret : 528 602 410 00011', 0, 2);
		$this->Cell(50, 5, utf8_decode('Tél : 09 84 04 18 75'));
		$this->Ln(10);
	}

	function Footer()
	{
		$this->setY(-20);
		$this->SetFont(FONT, '', FONT_SIZE_SMALL);
		$this->Cell(0, 5, 'Culturelle - SIRET : 52860241000011', 'T', 1,
			    'C');
		$this->Cell(0, 5, $this->PageNo() . '/{nb}', 0, 0, 'R');
	}

	function PrintBillInfo($bill_num, $date, $member_code)
	{
		$this->SetXY(100, 10);
		$this->SetFont(FONT, 'B', FONT_SIZE_BIG);
		$this->Cell(90, 10, 'Facture', 1, 2, 'C');
		$this->SetFont(FONT, 'B', FONT_SIZE_NORMAL);
		$this->Cell(30, 5, utf8_decode('N° facture'), 1, 0, 'C', true);
		$this->Cell(30, 5, 'Date', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Code client', 1, 2, 'C', true);

		$this->SetX(100);
		$this->SetFont(FONT, '', FONT_SIZE_NORMAL);
		$this->Cell(30, 5, $bill_num, 1, 0, 'C');
		$this->Cell(30, 5, $date, 1, 0, 'C');
		$this->Cell(30, 5, $member_code, 1, 0, 'C');
		$this->Ln(10);
	}

	function PrintMemberInfo($data)
	{
		$this->SetX(100);
		$this->SetFont(FONT, 'B', FONT_SIZE_NORMAL);
		$this->Cell(90, 10, $data['last_name'] . ' ' .
				   $data['first_name'], 'LRT', 2);
		$this->SetFont(FONT, '', FONT_SIZE_NORMAL);
		$this->Cell(90, 10, $data['address'], 'LR', 2);
		$this->Cell(90, 10, $data['postal_code'] . ' ' . $data['city'],
			    'LRB');
		$this->Ln();
	}

	function PrintBillDetail($data)
	{
		$this->SetY(80);
		$this->SetFont(FONT, 'B', FONT_SIZE_NORMAL);
		$this->Cell(100, 5, 'Description', 1, 0, 'C');
		$this->Cell(30, 5, utf8_decode('Quantité'), 1, 0, 'C');
		$this->Cell(30, 5, 'Prix HT', 1, 0, 'C');
		$this->Cell(30, 5, 'Total HT', 1, 1, 'C');

		$this->SetFont(FONT, '', FONT_SIZE_NORMAL);

		foreach ($data as $row) {
			$this->Cell(100, 10, $row['description'], 1);
			$this->Cell(30, 10, $row['quantity'], 1, 0, 'R');
			$this->Cell(30, 10, $row['price'], 1, 0, 'R');
			$this->Cell(30, 10, $row['total'], 1, 1, 'R');
		}

		$this->Ln(10);
	}

	function PrintBillTotal($total, $tva, $total_paid)
	{
		$tva_shown = $tva;
		$tva_amount = sprintf('%.2f', $total * $tva / 100);
		$total_ttc = sprintf('%.2f', $total + $tva_amount);

		if ($tva == 0) {
			$tva_shown = utf8_decode('Exonéré');
			$tva_amount = '';
			$total_ttc = $total;
		}

		$to_be_paid = sprintf('%.2f', $total_ttc - $total_paid);

		$this->SetY(230);
		$this->SetFont(FONT, 'B', FONT_SIZE_NORMAL);
		$this->Cell(20, 5, '% TVA', 1, 0, 'C', true);
		$this->Cell(20, 5, 'Base', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Montant TVA', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total HT', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total TVA', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total TTC', 1, 0, 'C', true);
		$this->Cell(30, 5, utf8_decode('Déjà réglé TTC'), 1, 1, 'C',
			    true);

		$this->SetFont(FONT, '', FONT_SIZE_NORMAL);
		$this->Cell(20, 5, $tva_shown, 1, 0, 'R');
		$this->Cell(20, 5, $total, 1, 0, 'R');
		$this->Cell(30, 5, $tva_amount, 1, 0, 'R');
		$this->Cell(30, 5, $total, 1, 0, 'R');
		$this->Cell(30, 5, $tva_amount, 1, 0, 'R');
		$this->Cell(30, 5, $total_ttc, 1, 0, 'R');
		$this->Cell(30, 5, $total_paid, 1, 2, 'R');

		$this->SetFont(FONT, 'B', FONT_SIZE_NORMAL);
		$this->Cell(30, 5, utf8_decode('Net à payer'), 1, 2, 'C', true);

		$this->SetFont(FONT, '', FONT_SIZE_NORMAL);
		$this->Cell(30, 5, $to_be_paid, 1, 0, 'R');
	}
}

<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'vendor/fpdf181/fpdf.php';

class Bill extends FPDF
{
	function Header()
	{
		$this->Image('http://www.insschool.fr/wp-content/uploads/' .
			'2012/08/logo-site-noir1.jpg');
		$this->Ln(5);

		$this->SetFont('Arial', 'B', 10);
		$this->Cell(50, 5, 'Association INS School', 0, 2);
		$this->SetFont('Arial', '', 10);
		$this->Cell(50, 5, '29 rue Jules Verne', 0, 2);
		$this->Cell(50, 5, '63100 Clermont-Ferrand', 0, 2);
		$this->Cell(50, 5, 'Siret : 528 602 410 00011', 0, 2);
		$this->Cell(50, 5, utf8_decode('Tél : 09 84 04 18 75'));
		$this->Ln(10);
	}

	function Footer()
	{
		$this->setY(-20);
		$this->SetFont('Arial', '', 8);
		$this->Cell(0, 5, 'Culturelle - SIRET : 52860241000011', 'T', 1,
			    'C');
		$this->Cell(0, 5, $this->PageNo() . '/{nb}', 0, 0, 'R');
	}

	function PrintBillInfo($bill_num, $date, $member_id)
	{
		$this->SetXY(100, 10);
		$this->SetFont('Arial', 'B', 12);
		$this->Cell(90, 10, 'Facture', 1, 2, 'C');
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(30, 5, utf8_decode('N° facture'), 1, 0, 'C', true);
		$this->Cell(30, 5, 'Date', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Code client', 1, 2, 'C', true);

		$this->SetX(100);
		$this->SetFont('Arial', '', 10);
		$this->Cell(30, 5, $bill_num, 1, 0, 'C');
		$this->Cell(30, 5, $date, 1, 0, 'C');
		$this->Cell(30, 5, $member_id, 1, 0, 'C');
		$this->Ln(10);
	}

	function PrintMemberInfo($data)
	{
		$this->SetX(100);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(90, 5, $data['last_name'] . ' ' .
				   $data['first_name'], 'LRT', 2);
		$this->SetFont('Arial', '', 10);
		$this->Cell(90, 5, $data['address'], 'LR', 2);
		$this->Cell(90, 5, $data['postal_code'] . ' ' . $data['city'],
			    'LRB');
		$this->Ln();
	}

	function PrintBillContent($data)
	{
		$this->SetY(80);
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(100, 5, 'Description', 1, 0, 'C');
		$this->Cell(30, 5, utf8_decode('Quantité'), 1, 0, 'C');
		$this->Cell(30, 5, 'Prix HT', 1, 0, 'C');
		$this->Cell(30, 5, 'Total HT', 1, 1, 'C');

		$this->SetFont('Arial', '', 10);
		$this->Cell(100, 10, $data['description'], 1);
		$this->Cell(30, 10, $data['quantity'], 1, 0, 'R');
		$this->Cell(30, 10, $data['price'], 1, 0, 'R');
		$this->Cell(30, 10, $data['total'], 1, 1, 'R');
		$this->Ln(10);
	}

	function PrintBillDetail($total, $total_paid)
	{
		$this->SetFont('Arial', 'B', 10);
		$this->Cell(20, 5, '% TVA', 1, 0, 'C', true);
		$this->Cell(20, 5, 'Base', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Montant TVA', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total HT', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total TVA', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total TTC', 1, 0, 'C', true);
		$this->Cell(30, 5, utf8_decode('Déjà réglé TTC'), 1, 1, 'C',
			    true);

		$this->SetFont('Arial', '', 10);
		$this->Cell(20, 5, utf8_decode('Exonéré'), 1, 0, 'R');
		$this->Cell(20, 5, $total, 1, 0, 'R');
		$this->Cell(30, 5, '', 1, 0, 'R');
		$this->Cell(30, 5, $total, 1, 0, 'R');
		$this->Cell(30, 5, '', 1, 0, 'R');
		$this->Cell(30, 5, $total, 1, 0, 'R');
		$this->Cell(30, 5, $total_paid, 1, 2, 'R');
		$this->SetFont('Arial', 'B', 10);

		$this->Cell(30, 5, utf8_decode('Net à payer'), 1, 2, 'C', true);

		$this->SetFont('Arial', '', 10);
		$this->Cell(30, 5, $total - $total_paid, 1, 0, 'R');
	}
}
?>

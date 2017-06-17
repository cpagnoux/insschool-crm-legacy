<?php
/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

class Bill extends FPDF
{
	const FONT = 'Arial';
	const FONT_SIZE_SMALL = 8;
	const FONT_SIZE_MEDIUM = 10;
	const FONT_SIZE_LARGE = 12;
	const FILL_COLOR = 192;

	protected $registration_id;
	protected $member_id;
	protected $bill_num;
	protected $date;
	protected $member_code;
	protected $member_data;
	protected $registration_detail;
	protected $total;
	protected $total_paid;

	protected function LoadMemberData()
	{
		$link = connect_database();

		$query = 'SELECT * FROM member WHERE member_id = ' .
			 $this->member_id;
		if (!$result = mysqli_query($link, $query)) {
			sql_error($link, $query);
			exit;
		}

		$this->member_data = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($link);
	}

	protected function LoadRegistrationDetail()
	{
		$season = get_registration_season($this->registration_id);

		$link = connect_database();

		$query = 'SELECT lesson.title FROM lesson ' .
			 'INNER JOIN registration_detail ' .
			 'ON registration_detail.lesson_id = ' .
			 'lesson.lesson_id ' .
			 'WHERE registration_detail.registration_id = ' .
			 $this->registration_id;
		if (!$result = mysqli_query($link, $query)) {
			sql_error($link, $query);
			exit;
		}

		$this->registration_detail = array();
		$this->registration_detail[] = array(
			'description' => 'SAISON ' . $season,
			'quantity' => '',
			'price' => '',
			'total' => ''
		);

		while ($row = mysqli_fetch_assoc($result)) {
			$this->registration_detail[] = array(
				'description' => $row['title'],
				'quantity' => 1,
				'price' => '',
				'total' => ''
			);
		}

		mysqli_free_result($result);
		mysqli_close($link);
	}

	public function LoadData($registration_id)
	{
		$this->registration_id = $registration_id;
		$this->member_id = get_member_id($this->registration_id);
		$this->bill_num = 'FCI' . sprintf('%05d',
						  $this->registration_id);
		$this->date = date('d/m/Y');
		$this->member_code = 'CL' . sprintf('%05d', $this->member_id);
		$this->LoadMemberData();
		$this->LoadRegistrationDetail();
		$this->total = registration_price($this->registration_id);
		$this->total_paid = total_paid('registration',
					       $this->registration_id);

		foreach ($this->member_data as &$value) {
			$value = strtoupper($value);
			$value = utf8_decode($value);
		}

		foreach ($this->registration_detail as &$row) {
			foreach ($row as &$value)
				$value = utf8_decode($value);
		}
	}

	public function Header()
	{
		$this->Image(PUBLIC_PATH . '/img/logo-white.jpg', null, null,
			     50);
		$this->Ln(5);

		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_MEDIUM);
		$this->Cell(50, 5, 'Association INS School', 0, 2);
		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(50, 5, '29 rue Jules Verne', 0, 2);
		$this->Cell(50, 5, '63100 Clermont-Ferrand', 0, 2);
		$this->Cell(50, 5, 'Siret : 528 602 410 00011', 0, 2);
		$this->Cell(50, 5, utf8_decode('Tél : 09 84 04 18 75'));
		$this->Ln(10);
	}

	public function Footer()
	{
		$this->setY(-20);
		$this->SetFont(self::FONT, '', self::FONT_SIZE_SMALL);
		$this->Cell(0, 5, 'Culturelle - SIRET : 52860241000011', 'T', 1,
			    'C');
		$this->Cell(0, 5, $this->PageNo() . '/{nb}', 0, 0, 'R');
	}

	protected function PrintBillInfo()
	{
		$this->SetXY(100, 10);
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_LARGE);
		$this->Cell(90, 10, 'Facture', 1, 2, 'C');
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_MEDIUM);
		$this->Cell(30, 5, utf8_decode('N° facture'), 1, 0, 'C', true);
		$this->Cell(30, 5, 'Date', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Code client', 1, 2, 'C', true);

		$this->SetX(100);
		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(30, 5, $this->bill_num, 1, 0, 'C');
		$this->Cell(30, 5, $this->date, 1, 0, 'C');
		$this->Cell(30, 5, $this->member_code, 1, 0, 'C');
		$this->Ln(10);
	}

	protected function PrintMemberInfo()
	{
		$this->SetX(100);
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_MEDIUM);
		$this->Cell(90, 10, $this->member_data['last_name'] . ' ' .
				   $this->member_data['first_name'], 'LRT', 2);
		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(90, 10, $this->member_data['address'], 'LR', 2);
		$this->Cell(90, 10, $this->member_data['postal_code'] . ' ' .
			    $this->member_data['city'], 'LRB');
		$this->Ln();
	}

	protected function PrintBillDetail()
	{
		$this->SetY(80);
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_MEDIUM);
		$this->Cell(100, 5, 'Description', 1, 0, 'C');
		$this->Cell(30, 5, utf8_decode('Quantité'), 1, 0, 'C');
		$this->Cell(30, 5, 'Prix HT', 1, 0, 'C');
		$this->Cell(30, 5, 'Total HT', 1, 1, 'C');

		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);

		foreach ($this->registration_detail as $row) {
			$this->Cell(100, 10, $row['description'], 1);
			$this->Cell(30, 10, $row['quantity'], 1, 0, 'R');
			$this->Cell(30, 10, $row['price'], 1, 0, 'R');
			$this->Cell(30, 10, $row['total'], 1, 1, 'R');
		}

		$this->Ln(10);
	}

	protected function PrintBillTotal()
	{
		$tva_shown = TVA;
		$tva_amount = sprintf('%.2f', $this->total * TVA / 100);
		$total_ttc = sprintf('%.2f', $this->total + $tva_amount);

		if (TVA == 0) {
			$tva_shown = utf8_decode('Exonéré');
			$tva_amount = '';
			$total_ttc = $this->total;
		}

		$to_be_paid = sprintf('%.2f', $total_ttc - $this->total_paid);

		$this->SetY(230);
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_MEDIUM);
		$this->Cell(20, 5, '% TVA', 1, 0, 'C', true);
		$this->Cell(20, 5, 'Base', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Montant TVA', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total HT', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total TVA', 1, 0, 'C', true);
		$this->Cell(30, 5, 'Total TTC', 1, 0, 'C', true);
		$this->Cell(30, 5, utf8_decode('Déjà réglé TTC'), 1, 1, 'C',
			    true);

		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(20, 5, $tva_shown, 1, 0, 'R');
		$this->Cell(20, 5, $this->total, 1, 0, 'R');
		$this->Cell(30, 5, $tva_amount, 1, 0, 'R');
		$this->Cell(30, 5, $this->total, 1, 0, 'R');
		$this->Cell(30, 5, $tva_amount, 1, 0, 'R');
		$this->Cell(30, 5, $total_ttc, 1, 0, 'R');
		$this->Cell(30, 5, $this->total_paid, 1, 2, 'R');

		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_MEDIUM);
		$this->Cell(30, 5, utf8_decode('Net à payer'), 1, 2, 'C', true);

		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(30, 5, $to_be_paid, 1, 0, 'R');
	}

	public function PrintBill()
	{
		$this->SetFillColor(self::FILL_COLOR);
		$this->PrintBillInfo();
		$this->PrintMemberInfo();
		$this->PrintBillDetail();
		$this->PrintBillTotal();
	}
}

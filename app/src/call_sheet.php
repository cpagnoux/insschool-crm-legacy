<?php
/*
 * Copyright (C) 2016 Christophe Pagnoux-Vieuxfort
 */

require_once 'vendor/setasign/fpdf/fpdf.php';

class CallSheet extends FPDF
{
	const FONT = 'Arial';
	const FONT_SIZE_MEDIUM = 10;
	const FONT_SIZE_LARGE = 12;

	function PrintHeader($lesson, $season, $quarter)
	{
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_LARGE);
		$this->Cell(0, 5, utf8_decode($lesson . ' - saison ' . $season .
					      ' - ' . $quarter));
		$this->Ln(10);
	}

	function PrintTable($registrants, $dates)
	{
		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(80, 7, '', 1);

		foreach ($dates as $date)
			$this->Cell(10, 7, $date, 1, 0, 'C');

		$this->Ln();

		foreach ($registrants as $registrant) {
			$this->Cell(80, 6,
				    utf8_decode($registrant['last_name'] . ' ' .
						$registrant['first_name']),
				    1);

			foreach ($dates as $date)
				$this->Cell(10, 6, '', 1);

			$this->Ln();
		}
	}
}

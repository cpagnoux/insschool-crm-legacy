<?php

/*
 * Copyright (C) 2016-2017 Christophe Pagnoux-Vieuxfort
 */

class CallSheet extends FPDF
{
	const FONT = 'Arial';
	const FONT_SIZE_MEDIUM = 10;
	const FONT_SIZE_LARGE = 12;

	protected $lesson_id;
	protected $season;
	protected $quarter;
	protected $lesson;
	protected $registrants;
	protected $day_of_week;
	protected $dates;

	protected function LoadLessonRegistrants()
	{
		$link = connect_database();

		$query = 'SELECT member.first_name, member.last_name ' .
			 'FROM member INNER JOIN registration ' .
			 'ON registration.member_id = member.member_id ' .
			 'INNER JOIN registration_detail ' .
			 'ON registration_detail.registration_id = ' .
			 'registration.registration_id ' .
			 'WHERE registration_detail.lesson_id = ' .
			 $this->lesson_id . ' AND registration.season = "' .
			 $this->season .
			 '" ORDER BY member.last_name, member.first_name';
		if (!$result = mysqli_query($link, $query)) {
			sql_error($link, $query);
			exit;
		}

		$this->registrants = array();

		while ($row = mysqli_fetch_assoc($result)) {
			$this->registrants[] = array(
				'first_name' => $row['first_name'],
				'last_name' => strtoupper($row['last_name'])
			);
		}

		mysqli_free_result($result);
		mysqli_close($link);
	}

	protected function LoadLessonDay()
	{
		$link = connect_database();

		$query = 'SELECT day FROM lesson WHERE lesson_id = ' .
			 $this->lesson_id;
		if (!$result = mysqli_query($link, $query)) {
			sql_error($link, $query);
			exit;
		}

		$row = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($link);

		$this->day_of_week = $row['day'];
	}

	public function LoadData($lesson_id, $season, $quarter)
	{
		$this->lesson_id = $lesson_id;
		$this->season = $season;
		$this->quarter = $quarter;
		$this->lesson = get_lesson_title($this->lesson_id);
		$this->LoadLessonRegistrants();
		$this->LoadLessonDay();
		$this->dates = dates_from_period($this->season, $this->quarter,
						 $this->day_of_week);
		$this->quarter = eval_quarter($this->quarter);
	}

	public function Header()
	{
		$this->SetFont(self::FONT, 'B', self::FONT_SIZE_LARGE);
		$this->Cell(0, 5, utf8_decode($this->lesson . ' - saison ' .
					      $this->season . ' - ' .
					      $this->quarter));
		$this->Ln(10);
	}

	protected function PrintTable()
	{
		$this->SetFont(self::FONT, '', self::FONT_SIZE_MEDIUM);
		$this->Cell(80, 7, '', 1);

		foreach ($this->dates as $date)
			$this->Cell(10, 7, $date, 1, 0, 'C');

		$this->Ln();

		foreach ($this->registrants as $registrant) {
			$this->Cell(80, 6,
				    utf8_decode($registrant['last_name'] . ' ' .
						$registrant['first_name']),
				    1);

			foreach ($this->dates as $date)
				$this->Cell(10, 6, '', 1);

			$this->Ln();
		}
	}

	public function PrintCallSheet()
	{
		$this->PrintTable();
	}
}

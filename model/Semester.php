<?php
class Semester {

	// private members
	/**
	 * @var DateTime
	 */
	private $end_date;

	/**
	 * @var int|null
	 */
	private $id;

	/**
	 * @var DateTime
	 */
	private $start_date;
	// end private members

	// public functions
	public function get_end_date(): DateTime { return $this->end_date; }
	public function get_id(): ?int { return $this->id; }
	public function get_start_date(): DateTime { return $this->start_date; }

	public function __construct(DateTime $start_date, DateTime $end_date, int $id = null) {
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->id = $id;
	}
	// end public functions
}
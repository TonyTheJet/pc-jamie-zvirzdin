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
     * @var SemesterModule[]
     */
	private $modules = [];

    /**
     * @var SemesterSection[]
     */
	private $sections = [];

	/**
	 * @var DateTime
	 */
	private $start_date;
	// end private members

	// public functions
	public function get_end_date(): DateTime { return $this->end_date; }
	public function get_id(): ?int { return $this->id; }
	public function get_start_date(): DateTime { return $this->start_date; }

    /**
     * Semester constructor.
     * @param DateTime $start_date
     * @param DateTime $end_date
     * @param SemesterModule[] $modules
     * @param SemesterSection[] $sections
     * @param int|null $id
     */
	public function __construct(
	    DateTime $start_date,
        DateTime $end_date,
        array $modules,
        array $sections,
        int $id = null
    ) {
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->modules = $modules;
		$this->sections = $sections;
		$this->id = $id;
	}
	// end public functions
}
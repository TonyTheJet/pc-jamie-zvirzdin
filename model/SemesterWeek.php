<?php
class SemesterWeek {

    // private members
    /**
     * @var DateTime
     */
    private $end_date;

    /**
     * @var SemesterWeekExercise[]
     */
    private $exercises = [];

    /**
     * @var int
     */
    private $id = 0;

    /**
     * @var int
     */
    private $num_electives_required = 2;

    /**
     * @var DateTime
     */
    private $start_date;
    // end private members

    // public functions
    /**
     * SemesterWeek constructor.
     * @param int $id
     * @param DateTime $start_date
     * @param DateTime $end_date
     * @param int $num_electives_required
     * @param SemesterWeekExercise[] $exercises
     */
    public function __construct(int $id, DateTime $start_date, DateTime $end_date, int $num_electives_required, array $exercises)
    {
        $this->id = $id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->num_electives_required = $num_electives_required;
        $this->exercises = $exercises;
    }
    // end public functions

}
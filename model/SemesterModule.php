<?php
class SemesterModule {

    // private members
    private $id = 0;
    private $name;

    /**
     * @var SemesterWeek[]
     */
    private $weeks = [];
    // end private members

    // public functions
    public function get_id(): int { return $this->id; }
    public function get_name(): string { return $this->name; }

    /**
     * @return SemesterWeek[]
     */
    public function get_weeks(): array { return $this->weeks; }

    /**
     * SemesterModule constructor.
     * @param int $id
     * @param string $name
     * @param SemesterWeek[] $weeks
     */
    public function __construct(int $id, string $name, array $weeks)
    {
        $this->id = $id;
        $this->name = $name;
        $this->weeks = $weeks;
    }
    // end public functions
}
<?php
class SemesterWeekExercise {

    // private members
    private $id = 0;
    private $repeatable = false;
    private $required = false;
    private $title = '';
    // end private members

    // public functions
    public function __construct(int $id, bool $repeatable, bool $required, string $title)
    {
        $this->id = $id;
        $this->repeatable = $repeatable;
        $this->required = $required;
        $this->title = $title;
    }
    // end public functions
}
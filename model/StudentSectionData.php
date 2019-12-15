<?php
class StudentSectionData {

    // private members
    private $data = [];
    // end private members

    // public functions
    public function get_data(): array { return $this->data; }
    public function set_data(array $data): void { $this->data = $data; }

    public function __construct(array $data = null)
    {
        if (!empty($data)){
            $this->set_data($data);
        }
    }

    public function to_json(): string {
        return json_encode($this->data);
    }
    // end public functions
    // end public members
}
<?php
class GradStudent {

	// private members
	private $email;
	private $name;
	// end private members

	// public functions
	public function get_email(): string { return $this->email; }
	public function get_name(): string { return $this->name; }

	public function __construct(string $email, string $name) {
		$this->email = $email;
		$this->name = $name;
	}
	// end public functions

}
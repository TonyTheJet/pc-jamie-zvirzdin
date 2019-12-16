<?php
class ActionAuthenticateStudent implements ActionInterface {

    // private members
    /**
     * @var UserSession
     */
    private $session;
    // end private members

    public function __construct(UserSession $session)
    {
        $this->session = $session;
    }

    public function get_message(): string
    {
        // TODO: Implement get_message() method.
        return 'Tony needs to code this';
    }

    public function get_is_successful(): bool
    {
        // TODO: Implement get_is_successful() method.
        return false;
    }

    public function process_action(array $input_data): void
    {
        // TODO: Implement process_action() method.
    }
}
<?php
class ActionLogOutUser implements ActionInterface {

    // private constants
    // end private constants

    // private members
    private $is_successful = false;
    private $message = 'No action yet taken';
    private $redirect = null;
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
        return $this->message;
    }

    public function get_is_successful(): bool
    {
        return $this->is_successful;
    }

    public function get_redirect(): ?string
    {
        return $this->redirect;
    }

    public function process_action(array $input_data): void
    {
        $this->session->clear_session();
        $this->is_successful = true;
        $this->message = 'Success';
        $this->redirect = '/';
    }
}
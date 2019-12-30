<?php
class ActionAuthenticateStudent implements ActionInterface {

    // private constants
    private const INPUT_KEY_EMAIL = 'email';
    private const INPUT_KEY_SECTION_NUMBER = 'section_number';
    // end private constants

    // private members
    private $is_successful = false;
    private $message = 'Unknown error occurred';
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
        $this->redirect = null;
        if (!empty($input_data[self::INPUT_KEY_EMAIL]) && !empty($input_data[self::INPUT_KEY_SECTION_NUMBER])){
            if ($this->session->authenticate_credentials(trim($input_data[self::INPUT_KEY_EMAIL]), trim($input_data[self::INPUT_KEY_SECTION_NUMBER]))){
                $this->is_successful = true;
                $this->message = 'Success';
                $this->redirect = '/';
            } else {
                $this->is_successful = false;
                $this->message = 'Email or section number invalid.';
            }
        } else {
            $this->is_successful = false;
            $this->message = 'Email and section number are required.';
        }
    }
}
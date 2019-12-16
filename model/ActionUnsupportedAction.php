<?php
class ActionUnsupportedAction implements ActionInterface {
    // public functions
    public function get_message(): string
    {
        return 'This action is not supported';
    }

    public function get_is_successful(): bool
    {
        return false;
    }

    public function process_action(array $input_data): void
    {
        // nothing to do
    }
}
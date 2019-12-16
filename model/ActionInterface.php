<?php
interface ActionInterface {
    public function get_message(): string;
    public function get_is_successful(): bool;
    public function process_action(array $input_data): void;
}
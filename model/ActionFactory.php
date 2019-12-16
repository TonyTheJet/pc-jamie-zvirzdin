<?php
class ActionFactory {

    public static function create_action(string $action, UserSession $session): ActionInterface {
        switch ($action){
            case 'authenticate-student':
                return new ActionAuthenticateStudent($session);
                break;
            default:
                return new ActionUnsupportedAction();
        }
    }
}
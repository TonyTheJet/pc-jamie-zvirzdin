<?php
class ActionFactory {

    public static function create_action(string $action, UserSession $session): ActionInterface {
        switch ($action){
            case 'authenticate-student':
                return new ActionAuthenticateStudent($session);
            case 'logout':
                return new ActionLogOutUser($session);
            default:
                return new ActionUnsupportedAction();
        }
    }
}
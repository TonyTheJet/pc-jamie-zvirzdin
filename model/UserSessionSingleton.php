<?php
class UserSessionSingleton {

    // private static variables
    /**
     * @var UserSession
     */
    private static $user_session;
    // end private static variables

    // public functions
    public static function get_user_session(PDO $db): UserSession {
        if (!empty(self::$user_session)){
            return self::$user_session;
        } else {
            self::$user_session = new UserSession($db);

            return self::$user_session;
        }
    }
    // end public functions
}
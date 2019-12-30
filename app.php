<?php
$error_message = '';
$message = '';
$user_session = UserSessionSingleton::get_user_session(DBSingleton::get_db_connection());
if (!empty($_REQUEST['action'])){
    $action = ActionFactory::create_action($_REQUEST['action'], $user_session);
    $action->process_action($_REQUEST);

    // set either the message or the redirect
    if ($action->get_is_successful()){
        $message = $action->get_message();
    } else {
        $error_message = $action->get_message();
    }

    // redirect, if necessary
    if (!empty($action->get_redirect())){
        header('Location: ' . $action->get_redirect());
        exit();
    }
}
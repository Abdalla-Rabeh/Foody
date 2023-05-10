<?php

if(!function_exists('redirect_to')){
    function redirect_to(string $url = '/foody/index.php'): void
    {
        header('Location:' . $url);
    }
}

if(!function_exists('is_user_logged_in')){
    function is_user_logged_in(): bool
    {
        if(session_id()){

            return isset($_SESSION['userLogged']);
        }
        return false;
    }
}

if(!function_exists('start_session')){
    function start_session(): void
    {
        if(!session_id()){
            session_start();
        }
    }
}
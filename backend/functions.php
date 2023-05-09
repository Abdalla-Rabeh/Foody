<?php

if(!function_exists('redirect_home')){
    function redirect_home(): void
    {
        header('Location:/foody/index.php');
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
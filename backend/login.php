<?php
$pdoObject = require_once __DIR__ . '/./db.php';
$operation = $_GET['operation'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];
//   session_destroy();
if(session_id() == ''){
//    die;
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";

    $user = show_one_record($pdoObject , 'select * from users where username = ? and password = ?' , [$username , $password]);
    if($user){

        session_regenerate_id();
        session_start();
        unset($user['password']);
        $_SESSION['userLogged'] = true;
        foreach($user as $key => $value){
            $_SESSION[$key] = $value;
        }
        echo 'User Logged In Successfully';
    } else {
        http_response_code(422);
        echo 'Wrong Credentials';
    }
} else {
    echo 'user already logged in';
}

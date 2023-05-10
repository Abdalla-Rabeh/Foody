<?php
require_once __DIR__.'/init.php';
$pdoObject = require_once __DIR__ . '/./db.php';
$operation = $_GET['operation'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];
//print_r($_POST);
if($requestMethod == 'POST'){
    $name = htmlspecialchars($_POST['name'] ?? "");

    $username = htmlspecialchars($_POST['username'] ?? "");
    $password = htmlspecialchars($_POST['password'] ?? "");
    $errors = [];

    if(!$username){
        $errors['username'] = 'username cannot be empty';
    } else if (!$password){
        $errors['password']  = 'password cannot be empty';
    } else if (!$name){
        $errors['name'] = 'name cannot be empty';
    }


    if(!$errors){
        //TODO check if username exists
        $userExists = show_one_record($pdoObject , 'select id from users where username = ?' , [$username]);
        if($userExists){
            $errors['username'] = 'username already taken';
        }
        else {
            store_record($pdoObject , 'insert into users (name , username , password) values(?,?,?)' , [
                $name ,
                $username,
                $password
            ]);

            redirect_to('/foody/login.php');
            die;
        }
    }

    else{
        print_r($_POST);
    }
    die;
} else {
    redirect_to();
}
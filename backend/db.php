<?php

$config = require_once __DIR__.'/./config.php';

$pdo = null;
try{
    $pdo = new PDO("mysql:host=" . $config['host'] .";dbname=" . $config['db_name'] , $config['username'] , $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

}catch(PDOException $e){
    http_response_code(500);
    echo 'failed to connect to database , please make sure that database file is uploaded and credentials are correct';
    die;
}
if(!function_exists('show_all')){
    function show_all(PDO $pdoObject , string $query = 'SELECT * FROM products' , array $bindings = []): bool|array
    {
        // start to get all products
        $statement = $pdoObject->prepare($query);
        $statement->execute($bindings);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

if(!function_exists('show_one')){
    function show_one(PDO $pdoObject , string $query , array $bindings = []){
        $statement = $pdoObject->prepare($query);
        $statement->execute($bindings);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
return $pdo;

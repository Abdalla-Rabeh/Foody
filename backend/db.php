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
return $pdo;

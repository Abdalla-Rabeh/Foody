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
if(!function_exists('show_all_records')){
    function show_all_records(PDO $pdoObject , string $query = 'SELECT products.id as id , products.name as name , products.how_to_make , products.image as image , categories.name as category_name FROM products JOIN categories on categories.id = products.category_id ORDER BY ID DESC' , array $bindings = []): bool|array
    {
        // start to get all products
        $statement = $pdoObject->prepare($query);
        $statement->execute($bindings);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

if(!function_exists('show_one_record')){
    function show_one_record(PDO $pdoObject , string $query , array $bindings = []){
        $statement = $pdoObject->prepare($query);
        $statement->execute($bindings);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}

if(!function_exists('store_record')){
    function store_record(PDO $pdoObject , string $query , array $bindings , string $showOneQuery = 'SELECT products.id as id , products.name as name , products.how_to_make , products.image as image , categories.name as category_name FROM products JOIN categories on categories.id = products.category_id ORDER BY ID DESC LIMIT 1'){

        // Storing The Product
        $statement = $pdoObject->prepare($query);
        $statement->execute($bindings);

        // Returning the stored product

        return show_one_record($pdoObject , $showOneQuery);
    }
}

if(!function_exists('delete_record')){
    function delete_record(PDO $pdoObject , string $query , array $bindings = []): bool
    {
        $statement = $pdoObject->prepare($query);

        return $statement->execute($bindings);
    }
}
return $pdo;

<?php
$pdoObject = require_once __DIR__.'/./db.php';
$operation = $_GET['operation'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == 'GET'){
    if($operation == 'show_all'){
        // start to get all products
        $statement = $pdoObject->prepare('SELECT * FROM products');
        $statement->execute();

        $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($allProducts);
    }
} else if ($requestMethod == 'POST'){

} else {
    echo 'Request method is not allowed';
}
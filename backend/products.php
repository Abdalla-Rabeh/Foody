<?php
$pdoObject = require_once __DIR__.'/./db.php';
$operation = $_GET['operation'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == 'GET'){
    if($operation == 'show_all'){
        // start to get all products
        echo json_encode(show_all($pdoObject));
    } else if ($operation == 'show_one'){
        $errors = [];
        $productId = $_GET['id'] ?? null;

        if(is_numeric($productId)){
            $product = show_one($pdoObject , 'select * from products where id = ? ' , [$productId]);

            if($product){
                echo json_encode($product);
                die;
            } else {
                $errors['id'] = 'id not found';
            }
        } else {
            $errors['id'] = 'id is not valid';
        }

        echo json_encode($errors);

    }
} else if ($requestMethod == 'POST'){

} else {
    echo 'Request method is not allowed';
}
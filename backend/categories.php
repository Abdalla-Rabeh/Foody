<?php
$pdoObject = require_once __DIR__ . '/./db.php';
$operation = $_GET['operation'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == 'GET'){
    if($operation == 'show_all'){
        echo json_encode(show_all($pdoObject , 'select id , name from categories'));
    }
} else if ($requestMethod == 'POST'){
    if($operation == 'store'){
        $errors = [];
        $name = $_POST['name'] ?? null;
        if($name){
            $name = htmlspecialchars($name);
            echo json_encode(
                store(
                    $pdoObject ,
                    'insert into categories (name) values(?)' ,
                    [$name],
                    'select id , name from categories order by id desc limit 1'
                )
            );

            die;
        }

        echo json_encode(['name' => 'name cannot be empty']);
        die;
    }
} else if ($requestMethod == 'DELETE'){
    if($operation == 'delete'){
        $id = $_GET['id'] ?? 0;

        delete_product($pdoObject , 'delete from categories where id = ?' , [$id]);
        echo 'success';
        die;
    }
}
else {
    echo 'something went wrong';
}

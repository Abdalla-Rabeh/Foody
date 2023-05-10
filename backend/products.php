<?php
$pdoObject = require_once __DIR__ . '/./db.php';
$operation = $_GET['operation'] ?? null;
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == 'GET') {
    if ($operation == 'show_all') {
        $query = 'SELECT products.id as id , products.name as name , products.how_to_make , products.image as image , categories.name as category_name FROM products JOIN categories on categories.id = products.category_id ORDER BY ID DESC';
        if(isset($_GET['handle']) && $_GET['handle']){
            $handle = $_GET['handle'];
            $query = "SELECT products.id as id , products.name as name , products.how_to_make , products.image as image , categories.name as category_name FROM products JOIN categories on categories.id = products.category_id where products.name like " . "'%$handle%'" . " or categories.name like " . "'%$handle%'";
        }
        // start to get all products
        echo json_encode(show_all_records($pdoObject , $query));
    } else if ($operation == 'show_one') {
        $errors = [];
        $productId = $_GET['id'] ?? null;

        if (is_numeric($productId)) {
            $product = show_one_record($pdoObject, 'SELECT products.id as id , products.name as name , products.how_to_make , products.image as image , categories.name as category_name FROM products JOIN categories on categories.id = products.category_id where products.id = ?', [$productId]);

            if ($product) {
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
} else if ($requestMethod == 'POST') {
    if ($operation == 'store') {
        $errors = [];

        $name = htmlspecialchars($_POST['name'] ?? "");
        $howToMake = htmlspecialchars($_POST['how_to_make'] ?? "");
        $image = $_FILES['image'] ?? null;

        if (!$name) {
            $errors['name'] = 'name cannot be empty';
        } else if (!$howToMake) {
            $errors['how_to_make'] = 'recipe cannot be empty';
        }
        if (!$image || (isset($image['error']) && is_array($image['error']))) {
            $errors['image'] = 'image cannot be empty';
        } else {
            // Check if Image Uploaded Successfully

            if ($image['error']) {
                $errors['image'] = 'an error occurred while uploading the image';
            } else if ($image['size'] > 10000000) {
                $errors['image'] = 'image is too big';
            } else if (!$errors) {

                // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
                // Check MIME Type by yourself.
                $fileInfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                        $fileInfo->file($image['tmp_name']),
                        array(
                            'jpg' => 'image/jpeg',
                            'png' => 'image/png',
                            'jfif' => 'image/jfif',
                        ),
                        true
                    )) {
                    $errors['image'] = 'file extension is not allowed';
                }
            }

            if(!$errors && isset($ext)){
                // Start Uploading the image
                $imageName = rand(1,10000).'_' . rand(1,10000);
                if (!move_uploaded_file(
                    $image['tmp_name'],
                    sprintf('./uploads/%s.%s',
                        $imageName,
                        $ext
                    )
                )) {
                    $errors['image'] = 'failed to upload the image';
                }

                if(!$errors){
                    $imageName.=".$ext";
                    // Start Storing The Product

                    http_response_code(201);
                    $storedProduct = store_record(
                        $pdoObject ,
                        'INSERT INTO products (name , how_to_make , image , category_id) VALUES (?,?,? , ?)',
                        [$name , $howToMake , $imageName , $_POST['category']],
                    );

                    echo json_encode($storedProduct);

                    die;
                }
            }

        }

        http_response_code(422);
        echo json_encode($errors);

    }
}
else if ($requestMethod == 'DELETE'){
    if($operation == 'delete'){
        $id = $_GET['id'] ?? null;
        $errors = [];
        if(is_numeric($id)){
            $image = show_one_record($pdoObject , 'select image from products where id = ?' , [$id]);
            if($image){
                $image=  $image['image'];
                unlink(__DIR__."/./uploads/$image");
            }
            if(delete_record($pdoObject , 'DELETE FROM products WHERE id =?' , [$id])){

                http_response_code(200);
                echo 'Product Deleted Successfully';

                die;
            } else $errors['id'] = 'product not found';
        } else {
            $errors['id'] = 'id is not valid';
        }

        http_response_code(422);
        echo json_encode($errors);
    }
}
else {
    echo 'Request method is not allowed';
}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost/foody/backend/products.php?operation=store" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="google">
        <textarea name="how_to_make">Google</textarea>
        <input type="file" name="image">
        <input type="submit" value="store" />
    </form>
</body>
</html>
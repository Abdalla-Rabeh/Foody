<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php

    ?>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    </tbody>
</table>
<form action="products.php?operation=show_all" method="post">
    <input type="submit" value="add">
</form>

</body>
</html>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    axios.get('backend.php?operation=show_all').then(function(res){
        console.log(res)
    }).catch(err => console.log(err))
</script>
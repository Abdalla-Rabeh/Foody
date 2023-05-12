<?php
$config = require_once __DIR__ . '/./backend/config.php';
require_once __DIR__ . '/./backend/init.php';

start_session();
if(!isset($_SESSION['userLogged']) || $_SESSION['role'] != 'admin'){
    redirect_to();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>اكلتي</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="Foody" name="keywords"/>
    <meta content="Foody" name="description"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/icon-3.png" type="image/x-icon"/>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
          rel="stylesheet"/>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet"/>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet"/>

</head>


<style>
    body {
        font-family: "Roboto", sans-serif;
    }

    h1 {
        text-align: center;
    }

    table,
    form {
        width: 500px;
        margin: 20px auto;
    }

    table {
        border-collapse: collapse;
        text-align: center;
    }

    table td,
    table th {
        border: 1px solid #3cb815;
        padding: 10px;
        font-size: 20px;
        font-family: system-ui;
        font-weight: bold;
    }

    label,
    input,select {
        display: block;
        margin: 10px 0;
        font-size: 20px;
    }

    label {
        cursor: pointer;
    }

    button {
        display: block;
        margin: 10px auto;
        width: 120px;
        border: none;
        background-color: #3cb815;
        color: #fff;
        border-radius: 10px;
    }

    input, label, button , select {
        padding: 10px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        font-family: system-ui;
    }
    select{
    border: 1px solid !important;
    margin: 10px auto !important;
    height: 60px !important;
    width: 200px !important;
    font-size: 20px !important;
    font-weight: bold !important;
    font-family: system-ui !important;
    }
    #storeProduct {
        background: #f1f1f1;
        padding: 40px;
    }

    table {
        width: 100%;
    }

    .deleteBtn {
        background-color: #f65005;
    }
</style>


<body style="direction: rtl;">
 <!-- Navbar Start -->
 <div class="container-fluid  wow fadeIn" data-wow-delay="0.1s" style="background-color: #e9ecef;">
        <nav
            class="navbar navbar-expand-lg navbar-light wow fadeIn"
            data-wow-delay="0.1s"
            style="transform: translateY(20px); padding: 20px"
        >
        <div class="container">
          <a href="index.php" class="navbar-brand">
            <h1 class="fw-bold text-primary m-0">
              ا<span class="text-secondary">كل</span>تي
            </h1>
          </a>
          <button
            type="button"
            class="navbar-toggler me-4"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto">
            <a href="index.php" class="nav-item nav-link"
                    >الصفحه الرئيسه</a
            >
              <a href="admin.php" class="nav-item nav-link active">الوصفات</a>
              <a href="categories.php" class="nav-item nav-link"
                >الاقسام</a
              >
              
              
            </div>
          </div>
        </div>
        </nav>
    </div>
    <!-- Navbar End -->
<form class="container" id="storeProduct">
    <div class="row">
        <div class="col">
            <label for="image_input" style="border: 2px dotted #3cb815;">صورة الوصفه</label>
            <input type="file" id="image_input" class="d-none" name="image" accept="image/png, image/jpg">
        </div>
        <div class="col">
            <label for="video_input" style="border: 2px dotted #3cb815;">فيديو الوصفه</label>
            <input type="file" id="video_input" class="d-none" name="video" accept="video/mp4, video/mkv">
        </div>
        <div class="col">
            <input type="text" name="name" id="url" placeholder="اسم الوصفه"/>
        </div>
        <div class="col">
            <input type="text" name="how_to_make" id="website" placeholder="مكونات الوصفه"/>
        </div>
        <div class="col">
        <select class="form-select" aria-label="Default select example" name="category" id="categories">
        </select>
        </div>
        <div class="col">
            <button>اضافه</button>
        </div>
    </div>
</form>
<div class="container">
    <table>
        <thead>
        <tr>
            <th>الصوره
                <div id="display_image"></div>
            </th>
            <th>الفيديو
                <div id="displayed_video"></div>
            </th>
            <th>اسم الوصفة</th>
            <th>تفاصيل</th>
            <th>اسم القسم</th>
            <th>اعدادت</th>
        </tr>
        </thead>
        <tbody id="displayed-products"></tbody>
    </table>

</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    const formEl = document.querySelector("form");
    const tbodyEl = document.querySelector("tbody");
    const tableEl = document.querySelector("table");

    function onAddWebsite(e) {
        e.preventDefault();

        const formData = new FormData(formEl);

        axios.post("<?= $config['backend_url']?>/products.php?operation=store",
            formData,
            {Accept: 'multipart/form-data'})
            .then(function (res) {
                console.log(res)
                let displayedProducts = document.getElementById('displayed-products');
                let newTr = document.createElement('tr');
                let data = res.data;

                newTr.setAttribute('tr-id', data.id);
                newTr.innerHTML = `

            <td><img src="<?=$config['backend_url']?>/uploads/${data.image}"></td>
            <td>
                <video width="300" height="200" controls>
                  <source src="<?=$config['backend_url']?>/uploads/${data.video}">
                </video>
            </td>
              <td>${data.name}</td>
              <td>${data.how_to_make}</td>
              <td>${data.category_name}</td>
              <td><button class="deleteBtn" data-id="${data.id}" onclick="deleteProduct(event)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
      `;
                displayedProducts.appendChild(newTr)

            })
            .catch(function (err) {
                console.log('an error occurred', err)
            })
    }

    // add event listener to all buttons

    function deleteProduct(event) {
        event.preventDefault();
        if (confirm('are u sure ?')) {
            let button = event.currentTarget,
                id = button.getAttribute('data-id'),
                clickedTr = button.parentElement.parentElement;

            axios.delete(`<?=$config['backend_url']?>/products.php?operation=delete&id=${id}`).then(function () {
                console.log('element deleted');
                clickedTr.remove();
            })
        }
    }

    formEl.addEventListener("submit", onAddWebsite);


    axios.get("<?= $config['backend_url']?>/products.php?operation=show_all").then(function (response) {
        let displayedProducts = document.getElementById('displayed-products');
        let newTr = document.createElement('tr');

        displayedProducts.appendChild(newTr)
        // fetch all product from backend
        if (Array.isArray(response.data)) {

            response.data.forEach((product) => {
                let displayedProducts = document.getElementById('displayed-products');
                let newTr = document.createElement('tr');
                newTr.setAttribute('tr-id', response.data.id);

                newTr.innerHTML = `

            <td>
            <img style="width: 100px;" src="<?=$config['backend_url']?>/uploads/${product.image}">
            </td>

            <td>
                <video width="320" height="240" controls>
                  <source src="<?=$config['backend_url']?>/uploads/${product.video}">
                </video>
            </td>
              <td>${product.name}</td>
              <td>${product.how_to_make}</td>
              <td>${product.category_name}</td>
              <td><button class="deleteBtn" data-id="${product.id}" onclick="deleteProduct(event)"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
      `;
                displayedProducts.appendChild(newTr);

            });

        }
    })


    // fetching categories
    axios.get("<?= $config['backend_url']?>/categories.php?operation=all_select").then(function(response){
        let categories = response.data;
        let categoriesContainer = document.querySelector('#categories');
        let allCategories = '';
        categories.forEach(function(category){
            allCategories+= `<option value="${category.id}">${category.name}</option>`
        })

        categoriesContainer.innerHTML = allCategories;
    })
</script>
</body>

</html>
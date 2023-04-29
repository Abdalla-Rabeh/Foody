<?php
$config = require_once __DIR__ . '/./backend/config.php';
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
    input {
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
        border:none;
        background-color : #3cb815;
        color:#fff;
        border-radius: 10px; 
    }
    input , label , button{
        padding: 10px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    font-family: system-ui;
    }
    #storeProduct{
    background: #f1f1f1;
    padding: 40px;}
    table{
        width: 100%;
    }
    .deleteBtn{
        background-color: #f65005;
    }
</style>


<body style="direction: rtl;">
<form class="container" id="storeProduct">
    <div class="row">
        <div class="col">
            <label for="image_input" style="border: 2px dotted #3cb815;">صورة الوصفه</label>
            <input type="file" id="image_input" class="d-none" name="image" accept="image/png, image/jpg">
        </div>
        <div class="col">
            <input type="text" name="name" id="url" placeholder="اسم الوصفه"/>
        </div>
        <div class="col">
            <input type="text" name="how_to_make" id="website" placeholder="مكونات الوصفه"/>
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
                <th>اسم الوصفة</th>
                <th>المكونات</th>
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
        const img = document.querySelector('input[type="file"]');

        const file = img.files[0];
        const website = document.getElementById("website").value;
        const url = document.getElementById("url").value;
        const formData = new FormData(formEl);

        axios.post("<?= $config['backend_url']?>/products.php?operation=store",
            formData,
            {Accept: 'multipart/form-data'})
            .then(function (res) {
                let displayedProducts = document.getElementById('displayed-products');
                let newTr = document.createElement('tr');
                newTr.innerHTML = `

            <td><img src="<?=$config['backend_url']?>/uploads/${res.data.image}"></td>
              <td>${res.data.name}</td>
              <td>${res.data.how_to_make}</td>
              <td><button class="deleteBtn" data-id="${res.data.id}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
      `;
                displayedProducts.appendChild(newTr)

            })
            .catch(function (err) {
                console.log('an error occurred', err)
            })
    }


    function onDeleteRow(e) {
        // console.log('This is Delete', e.currentTarget);
        // const btn = e.target;
        // console.log(btn.getAttribute('data-id'))
        // if (!e.target.classList.contains("deleteBtn")) {
        //     return;
        // }

        // btn.closest("tr").remove();
    }

    // add event listener to all buttons

    function deleteProduct(event) {
        console.log('This is Delete Btn', event)
        event.preventDefault();
    }

    formEl.addEventListener("submit", onAddWebsite);
    tableEl.addEventListener("click", onDeleteRow);

    axios.get("<?= $config['backend_url']?>/products.php?operation=show_all").then(function (response) {
        let displayedProducts = document.getElementById('displayed-products');
        let newTr = document.createElement('tr');

        displayedProducts.appendChild(newTr)
        // fetch all product from backend
        if (Array.isArray(response.data)) {

            response.data.forEach((product) => {
                let displayedProducts = document.getElementById('displayed-products');
                let newTr = document.createElement('tr');
                newTr.innerHTML = `

            <td><img src="<?=$config['backend_url']?>/uploads/${product.image}"></td>
              <td>${product.name}</td>
              <td>${product.how_to_make}</td>
              <td><button class="deleteBtn" data-id="${product.id}"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
      `;
                displayedProducts.appendChild(newTr);

            });

        }

        document.querySelectorAll('.deleteBtn').forEach(function (button) {
            console.log(button)
            button.addEventListener('click', function (e) {
                if (confirm('are u sure ? ')) {
                    let id = e.currentTarget.getAttribute('data-id');

                    axios.delete(`<?=$config['backend_url']?>/products.php?operation=delete&id=${id}`).then(function () {
                        console.log('element deleted');
                    })
                }
            })
        })
    })

</script>
</body>

</html>
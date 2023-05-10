<?php
require_once __DIR__.'/backend/init.php';
$config = require_once __DIR__ . '/./backend/config.php';
$id = $_GET['id'] ?? 0;
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
    <style>
        .box {
    background: #f1f1f1;
    padding: 20px;
    width: 80%;
    margin: 20px auto;
    box-shadow: 10px 20px 0px #3cb815;
}
        .box span , .box p {
            color: #3cb815;
        }
        
    </style>

</head>




<body style="direction: rtl;">
    


<!-- Navbar Start -->
<div class="container-fluid wow fadeIn" data-wow-delay="0.1s">
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
                    <a href="product.php" class="nav-item nav-link active">الوصفات</a>
                    <a href="video.html" class="nav-item nav-link"
                    >الفيدوهات</a>
                    <?php
                    if(isset($_SESSION['userLogged']) && $_SESSION['role'] == 'admin'){
                        echo "<button><a href='admin.php' style='color: #fff'>لوحه التحكم</a></button>";
                    }
                    ?>
                    <button
                            class="btn btn-primary"
                            style="
                  width: 130px !important;
                  margin: 10px auto;
                  height: 50px;
                  border-radius: 50px;
                "
                    >
                        <?php
                        if(!is_user_logged_in()){
                            echo '<a href="backend/login.php" style="color: #fff"> تسجيل الدخول </a>';
                        } else {
                            echo "<a href='{$config['backend_url']}/logout.php' style='color: #fff'> تسجيل الخروج </a>";
                        }
                        ?>
                    </button>

                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
    <!-- Page Header Start -->
    <div
      class="container-fluid page-header mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">تفاصيل الوصفه</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-body" href="#">الصفحه الرئيسه</a>
            </li>
            <li class="breadcrumb-item text-dark active" aria-current="page">
              تفاصيل الوصفه
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img" id="productImage">
                </div>
            </div>
            <div class="col-lg-6 m-auto">
            <div class="box" id="productDetails">

            </div>
            </div>
        </div>
    </div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    axios.get("<?=$config['backend_url']?>/products.php?operation=show_one&id=<?=$id?>").then(function(response){
        let productDetails = response.data;
        let productDetailsContainer = document.querySelector('#productDetails');
        productDetailsContainer.innerHTML = `
        <h2>
                    اسم الوصفه  :
                    <span>
                        ${productDetails.name}
                    </span>
                </h2>
                <h3> اسم القسم : <span> ${productDetails.category_name}</span></h3>
                <h4> <span style="color:#000;"> مكونات الوصفه</span>   </h4>
                <p style="font-size:20px; line-height:2; letter-spacing: 1.5px; font-family: system-ui;">
                    
                </p>
                <iframe src="https://www.youtube.com/embed/${productDetails.how_to_make}"></iframe>
        `;

        let productImage = document.querySelector('#productImage');
        productImage.innerHTML = `
        <img src="<?=$config['backend_url']?>/uploads/${productDetails.image}" alt="img" style="max-width: 80%; height: auto; padding: 20px;">
        `
    })
</script>
</body>

</html>
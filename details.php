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
                    <button
                            class="btn btn-primary"
                            style="
                  width: 130px !important;
                  margin: 10px auto;
                  height: 50px;
                  border-radius: 50px;
                "
                    >
                        <a href="login.html" style="color: #fff"> تسجيل الدخول </a>
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
                <div class="img">
                    <img src="img\about.jpg" alt="img" style="max-width: 80%; height: auto; padding: 20px;">
                </div>
            </div>
            <div class="col-lg-6">
                
            </div>
        </div>
    </div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>



</body>

</html>
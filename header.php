<?php
require_once __DIR__.'/backend/init.php';
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
    <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
            rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
            rel="stylesheet"
    />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
            rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet"/>
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet"/>
    <style>
        button{
            width: 130px !important;
    margin: 10px auto;
    height: 50px;
    border-radius: 50px;
    background-color: #3CB815;
    border: none;
    color: #fff;
        }
    </style>
</head>

<body style="direction: rtl">
<!-- Spinner Start -->
<div
        id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
>
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<div class="container-fluid fixed-top wow fadeIn" data-wow-delay="0.1s">
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
                    <a href="index.php" class="nav-item nav-link active"
                    >الصفحه الرئيسه</a
                    >
                    <a href="product.php" class="nav-item nav-link">الوصفات</a>
                    <a href="video.php" class="nav-item nav-link active"
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
                                echo '<a href="login.php" style="color: #fff"> تسجيل الدخول </a>';
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

<?php
$config = require_once __DIR__ . '/./backend/config.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Foody</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Foody" name="keywords" />
    <meta content="Foody" name="description" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/icon-3.png" type="image/x-icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
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
              <a href="index.php" class="nav-item nav-link">الصفحه الرئيسه</a>
              <a href="product.php" class="nav-item nav-link active"
                >الوصفات</a
              >
              <a href="video.html" class="nav-item nav-link"
                >الفيدوهات</a
              >
              <button
                class="btn btn-primary"
                style="
                  width: 130px !important;
                  margin: 10px auto;
                  height: 50px;
                  border-radius: 50px;
                "
              >
                <a href="login.php" style="color: #fff"> تسجيل الدخول </a>
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
        <h1 class="display-3 mb-3 animated slideInDown">الوصفات</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-body" href="#">الصفحه الرئيسه</a>
            </li>
            <li class="breadcrumb-item text-dark active" aria-current="page">
              الوصفات
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->
    <div class="container">
      <form action="">
          <div class="row">
            <div class="col">
              <input class="form-control" type="serach" id="formSerach">
            </div>
            <div class="col">
              <button>بحث</button>
          </div>
          </form>
      </div>
    </div>
    <!-- Product Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-0 gx-5 align-items-end">
          <div class="col-lg-12">
            <div
              class="section-header text-center mb-5 wow fadeInUp m-auto"
              data-wow-delay="0.1s"
              style="max-width: 500px"
            >
              <h1 class="display-5 mb-3">الوصفات</h1>
            </div>
          </div>
        </div>
        <div class="tab-content">
          <div class="row g-4">
              <div class="product-item">
                <div class="position-relative bg-light overflow-hidden row" id="recipes">
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Product End -->

    <!-- Footer Start -->
    <div
      class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container-fluid copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center m-auto">
              &copy; <a href="#">BugOff</a>, جميع الحقوق محفوظه لدي.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a
      href="#"
      class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
<!--    <script src="js/view.js"></script>-->

  </body>
</html>

<script>
    $.ajax({
        url: "<?= $config['backend_url']?>/products.php?operation=show_all",
        method: 'get',
        headers: {
            accept: "application/json"
        },
        dataType: 'json',
        success: function (response) {
            const recipes = document.querySelector("#recipes");

            // fetch all product from backend
            response.forEach((product) => {
                const div = document.createElement("div");
                // ✅ Add classes to element
                div.classList.add("col-lg-4", "m-auto");
                div.innerHTML = `
                <img class="img-fluid w-100" src="<?= $config['backend_url']?>/uploads/${product.image}" alt="img-${product.image}" />
                <div style="background-color: #3CB815;
                border-color: #3CB815;
                color: #fff;">
                <a href="product_details.php?id=${product.id}"
                <p id="title" class="part-food text-center border-top">${product.name}</p>
                </a>
            </div>
            `;
                recipes.appendChild(div);
            });
        },
        error: function (error) {
            console.log(error.responseText)
        }
    })
</script>
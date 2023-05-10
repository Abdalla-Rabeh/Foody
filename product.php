<?php
require_once __DIR__.'/header.php';
?>
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
            <div class="col m-auto">
              <input class="form-control" type="serach" id="productSearch">
            </div>
            <div class="col m-auto">
              <button style="width: 100px !important;
              background-color: #3CB815;
              color: #ffff;
              font-size: 20px;
              font-weight: bold;
              height: 50px;
              border-radius: 50px;
              border: none;">بحث</button>
            </div>
          </div>
      </form>
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
    let searchInput = document.querySelector('#productSearch');

    searchInput.addEventListener('keyup' , function(e){
        let inputValue = e.currentTarget.value;
        if(inputValue){
            showAllProducts(inputValue);
        }
        else {
            // const recipes = document.querySelector("#recipes");

            showAllProducts();
        }

    })


    function showAllProducts(handle = null){
        let url = "<?= $config['backend_url']?>/products.php?operation=show_all";
        if(handle){
            url+=`&handle=${handle}`
        }
        $.ajax({
            url: url,
            method: 'get',
            headers: {
                accept: "application/json"
            },
            dataType: 'json',
            success: function (response) {
                const recipes = document.querySelector("#recipes");
recipes.innerHTML = '';
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
                <p id="title" class="part-food text-center" style="text-decoration: none; color: #fff; display: flow-root;">${product.name}</p>
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
    }

    showAllProducts();
</script>
<?php
require_once __DIR__.'/header.php';
?>

<!-- Navbar End -->

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/carousel-1.jpg" alt="Image"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">
                                    الغذاء العضوي مفيد للصحة
                                </h1>
                                <a
                                        href="product.php"
                                        class="btn btn-primary rounded-pill py-sm-3 px-sm-5"
                                >الوصفات</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/carousel-2.jpg" alt="Image"/>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">
                                    الغذاء الطبيعي دائما صحي
                                </h1>
                                <a
                                        href="product.php"
                                        class="btn btn-primary rounded-pill py-sm-3 px-sm-5"
                                >الوصفات</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#header-carousel"
                data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#header-carousel"
                data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="img/about.jpg" alt="image"/>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">أفضل الوصفات الاكليه المتميزه</h1>
                <p class="mb-4">
                    نقدم لكم اجود وافضل الوصفات الاكل في الوطن العربي
                </p>
                <p>
                    <i class="fa fa-check text-primary me-3"></i>نتميز بمجموعة من أشهر
                    الطهاة
                </p>
                <p>
                    <i class="fa fa-check text-primary me-3"></i>أكثر من 10 سنوات من
                    الخبرة في مجال الطهي
                </p>
                <p>
                    <i class="fa fa-check text-primary me-3"></i>لقد كبرنا معكم ومع
                    جهودكم الكبيرة طوال الرحلة
                </p>
                <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href=""
                >قراء المزيد</a
                >
            </div>
        </div>
    </div>
</div>
<!-- About End -->

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
<!--<script src="js/view.js"></script>-->
</body>
</html>

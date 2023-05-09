<?php
$config = require_once __DIR__ . '/./backend/config.php';
require_once __DIR__.'/./backend/init.php';

if(is_user_logged_in()){
    redirect_home();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>اكلتي</title>
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
  <body>
    <section class="vh-100" style="background-color: #f65005; direction: rtl">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem">
              <div class="card-body p-5 text-center">
                <h3 class="mb-5">تسجيل الدخول</h3>

                <div class="form-outline mb-4">
                  <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control form-control-lg"
                    placeholder="اسم المستخدم"
                  />
                </div>

                <div class="form-outline mb-4">
                  <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control form-control-lg"
                    placeholder="كلمه المرور"
                  />
                </div>

                <button
                  class="btn btn-primary btn-lg btn-block"
                  type="submit"
                  id="submit"
                  onclick="loginUser(event)"
                >
                  تسجيل
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function loginUser(){
            let formData = new FormData();
            formData.append('username' , document.querySelector('#username').value);
            formData.append('password' , document.querySelector('#password').value);
            axios.post("<?=$config['backend_url']?>/login.php" , formData).then(function(res){
                window.location.replace('/foody/index.php')
            }).catch(function(err){
                console.log(err.data);
            })
        }
    </script>
  </body>
</html>
<?php
include "./config/appsettings.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>(TOPSIS):: Rekomendasi Produk - UNBIN</title>

    <!-- Custom fonts for this template-->
    <link
      href="<?=$baseurl?>/assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="<?=$baseurl?>/assets/css/sb-admin-2.min.css" rel="stylesheet" />
  </head>
 

  <body class="d-flex bg-gradient-primary justify-content-center align-items-center" style="height: 100vh;">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-7 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-5">
                  <div class="p-4">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 font-weight-bold">Selamat Datang!</h1>
                      <p class="mb-4">Aplikasi Sistem Pendukung Keputusan</p>
                    </div>
                    
                     
                    <?php
                    
                    if (!empty($_GET['error'])) {
                      if ($_GET['error']==4) {
                        echo '<script>window.alert("Username dan Password tidak terdaftar");</script>';
                        echo '
                        <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <strong>Warning!</strong> Username dan Password tidak terdaftar! Coba Lagi.
                        </div>';
                      }
                    }
                    ?>
                    
                    <form action="<?=$baseurl?>/check_in.php" method="POST" class="form-signin">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username..." required autofocus />
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" placeholder="Enter Password..." required />
                      </div>
                      
                      <button
                        type="submit"
                        class="btn btn-primary btn-user btn-block"
                      >
                        Login
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=$baseurl?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$baseurl?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$baseurl?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=$baseurl?>/assets/js/sb-admin-2.min.js"></script>
    
    
  </body>
</html>

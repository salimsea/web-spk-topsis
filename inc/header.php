<?php
error_reporting(0);
include "../check_login.php";
include "../config/koneksi.php";  
include "../config/fungsi_indotgl.php";
include "../config/fungsi.php";
include "../config/library.php";
include '../config/librari.php'; 
include '../config/appsettings.php';
$tanggal = tgl_indo(date("Y m d"));
$jam     = date("H:i:s");
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

    <link
      href="<?=$baseurl;?>/assets/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <link href="<?=$baseurl;?>/assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="<?=$baseurl;?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?=$baseurl;?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$baseurl;?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

  <body id="page-top">
    <div id="wrapper">
      <?php include_once 'menu.php'; ?>

      <div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
<?php include_once 'navbar.php'; ?>
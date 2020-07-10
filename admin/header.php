<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
  session_start();
  include '../conn/koneksi.php';
  $username = $_SESSION['username'];
  $login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
        $data = mysqli_fetch_assoc($login);
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
        <?php 
        
        echo $data['nama_depan']." ".$data['nama_belakang'];

          ?>
          
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">DATA MASTER</li>
          <li class="nav-item">
                <a href="kendaraan/index.php" class="nav-link">
                <!-- <i class="nav-icon far fa-sign-out" aria-hidden="true"></i> -->
              <i class="nav-icon fa fa-car"></i>
                <p>
                    Tambah Kendaraan
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="tujuan/index.php" class="nav-link">
                <!-- <i class="nav-icon far fa-sign-out" aria-hidden="true"></i> -->
              <i class="nav-icon fa fa-road"></i>
                <p>
                    Tambah Tujuan
                </p>
                </a>
            </li>
          <li class="nav-header">KONFIRMASI</li>
            <li class="nav-item">
                <a href="verifikasi/index.php" class="nav-link">
                <!-- <i class="nav-icon far fa-sign-out" aria-hidden="true"></i> -->
              <i class="nav-icon fa fa-money"></i>
                <p>
                    Konfirmasi Pembayaran
                </p>
                </a>
            </li>
          <li class="nav-header">LIST</li>
            <li class="nav-item">
                <a href="pembayaran_diterima.php" class="nav-link">
                <!-- <i class="nav-icon far fa-sign-out" aria-hidden="true"></i> -->
              <i class="nav-icon fa fa-check"></i>
                <p>
                    List Pembayaran DiTerima
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pembayaran_ditolak.php" class="nav-link">
                <!-- <i class="nav-icon far fa-sign-out" aria-hidden="true"></i> -->
              <i class="nav-icon fa fa-times"></i>
                <p>
                    List Pembayaran DiTolak
                </p>
                </a>
            </li>
          <li class="nav-header">KELUAR</li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                <!-- <i class="nav-icon far fa-sign-out" aria-hidden="true"></i> -->
              <i class="nav-icon fa fa-sign-in"></i>
                <p>
                    Logout
                </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-RENTAL</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">E-RENTAL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <?php
            session_start();
            require_once "conn/koneksi.php";
            if(isset($_SESSION['username']) == NULL){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <?php
            }else{
          ?>
          <div class="dropdown show">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?=$_SESSION['username']?>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <?php 
            $username = $_SESSION['username'];
            $login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
            $data = mysqli_fetch_assoc($login);
            $count = mysqli_query($koneksi,"SELECT COUNT(*) as tagihan FROM ta_reservasi WHERE id_user='$data[id]' AND status = 2");
            $tagihan = mysqli_fetch_assoc($count);
            // var_dump($count);exit;
            // $dataTagihan = mysqli_num_rows($count);
            ?>
            <a class="dropdown-item" href="tagihan.php">Tagihan <span class="badge badge-dark"><?=$tagihan['tagihan'];?></span></a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>
            <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
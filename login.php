<?php
    include_once "header.php";
    include 'conn/koneksi.php';
if($_POST){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);
    
    if($cek > 0){
        $data = mysqli_fetch_assoc($login);
        // var_dump($data);exit;
        if($data['level'] == "customer"){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "customer";
            header("location:index.php");
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['level'] = "admin";
            header("location:admin/index.php");
        }
    }else{
        echo 'Gagal!';
    }
}
?>
<!-- BODY -->
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin:10px auto">
            <h1 class="text-center login-title">Masuk</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" method="POST" action="">
                <input type="text" class="form-control" name="user" placeholder="Username" required autofocus>
                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                </span>
                </form>
            </div>
            <span class="text-center new-account">Belum Punya Akun? Klik <a href="register.php">Buat Akun</a></span>
        </div>
    </div>
</div>
<?php
    include_once "footer.php";
?>
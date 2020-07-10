<?php
    include_once "header.php";
    require_once 'conn/koneksi.php';

    if($_POST){
        try {
           $sql = "INSERT INTO user (email,username,password,level,nama_depan,nama_belakang,no_ktp) 
                    VALUES ('".$_POST['email']."','".$_POST['username']."','".$_POST['password']."','".$_POST['level']."','".$_POST['nama_depan']."','".$_POST['nama_belakang']."','".$_POST['ktp']."')";
           if(!$koneksi->query($sql)){
              echo $koneksi->error;
              die();
            }
        } catch (Exception $e) {
          echo $e;
          die();
        }
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Pendaftaran Berhasil');
                window.location.href='login.php';
                </script>");
    }
    //count id otomatis
    // $query = mysqli_query($koneksi,"SELECT max(id_tempat) FROM ref_tempat");
    //         $no = mysqli_fetch_array($query);
    //         if ($no) {
    //             $nomor = $no[0];
    //             $kode = (int) $nomor;
    //             $kode = $kode + 1;
    //         }else{
    //             $kode = '1';
    //         }
    ?>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama_dpn">Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan" id="nama_dpn" placeholder="Nama Depan">
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_belakang">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
                </div>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="ktp">No. KTP/SIM</label>
                <input type="text" class="form-control" name="ktp" id="ktp" placeholder="No. KTP/SIM">
                <input type="hidden" class="form-control" name="level" id="level" value="customer">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php 
    include_once "footer.php";
?>
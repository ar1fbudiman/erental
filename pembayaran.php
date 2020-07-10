<?php include_once "header.php"; 
require_once 'conn/koneksi.php';
    $id_reservasi = $_GET['id_reservasi'];
    // print_r($id_reservasi);exit;
    if(isset($_FILES['buktipembayaran']['name']) && isset($_FILES['buktipembayaran']['tmp_name'])){
    $buktipembayaran = $_FILES['buktipembayaran']['name'];
    $tmp = $_FILES['buktipembayaran']['tmp_name'];
$buktipembayaranbaru = $buktipembayaran;
// Set path folder tempat menyimpan fotonya
$path = "assets/img/bukti/".$buktipembayaranbaru;
}
if($_POST){
    try {
        if(move_uploaded_file($tmp, $path)){
       $sql = "INSERT INTO ta_pembayaran 
				(id,
				id_reservasi,
				nama_pengirim,
				total_pembayaran,
				bukti_pembayaran) 
                VALUES 
				('".$_POST['id']."',
				'".$id_reservasi."',
				'".$_POST['nama_pengirim']."',
				'".$_POST['total_pembayaran']."',
				'".$buktipembayaranbaru."')";
			}      
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }

        $sqlupdate = "UPDATE ta_reservasi 
        SET 
            status = 3
        WHERE 
            id=".$id_reservasi;

        if(!$koneksi->query($sqlupdate)){
            echo $koneksi->error;
            die();
          }
    } catch (Exception $e) {
      echo $e;
      die();
	}
	// var_dump($sql);exit; 
	
    echo "<script>
         window.location.href='tagihan.php';
         </script>";
}
$query = mysqli_query($koneksi,"SELECT max(id) FROM ta_pembayaran");
        $no = mysqli_fetch_array($query);
        if ($no) {
            $nomor = $no[0];
            $kode = (int) $nomor;
            $kode = $kode + 1;
        }else{
            $kode = '1';
        }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="card-title text-center"><h4>Form Pembayaran</h4></div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_pengirim">Nama Pengirim</label>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?=$kode?>">
                            <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim">
                        </div>
                        <div class="form-group">
                            <label for="total_pembayaran">Jumlah Transfer</label>
                            <input type="text" class="form-control" name="total_pembayaran" id="total_pembayaran">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Gambar</label>
                            <input type="file" class="form-control-file" name="buktipembayaran" id="exampleFormControlFile1">
                        </div>
                        <div class="card-footer">
                            <input class="btn btn-info btn-block" type="submit" name="Simpan" value="Simpan">					
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php" ?>

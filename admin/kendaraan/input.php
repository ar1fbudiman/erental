<?php 
	include_once "header.php";
	require_once '../../conn/koneksi.php';
if(isset($_FILES['gambar']['name']) && isset($_FILES['gambar']['tmp_name'])){
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$gambarbaru = $gambar;
// Set path folder tempat menyimpan fotonya
$path = "../../assets/img/mobil/".$gambarbaru;
}
if($_POST){
    try {
        if(move_uploaded_file($tmp, $path)){
       $sql = "INSERT INTO ref_kendaraan 
				(id,
				nm_kendaraan,
				tipe_kendaraan,
				pabrikan,
				harga,
				total_penumpang,
				status,
				gambar) 
                VALUES 
				('".$_POST['id']."',
				'".$_POST['nm_kendaraan']."',
				'".$_POST['tipe_kendaraan']."',
				'".$_POST['pabrikan']."',
				'".$_POST['harga']."',
				'".$_POST['total_penumpang']."',
				'".$_POST['status']."',
				'".$gambarbaru."')";
			}      
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }
    } catch (Exception $e) {
      echo $e;
      die();
	}
	// var_dump($sql);exit; 
	
    echo "<script>
         window.location.href='index.php';
         </script>";
}
$query = mysqli_query($koneksi,"SELECT max(id) FROM ref_kendaraan");
        $no = mysqli_fetch_array($query);
        if ($no) {
            $nomor = $no[0];
            $kode = (int) $nomor;
            $kode = $kode + 1;
        }else{
            $kode = '1';
        }
?>
<div class="col-md-12">
	<div class="card">
	<div class="card-header">
			<div class="card-title">
				<h3>Tambah Data Kendaraan</h3>
			</div>
		</div>
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">		
				<div class="form-group">
					<label>Nama Kendaraan</label>
					<input class="form-control" type="hidden" value="<?=$kode?>" name="id">					
					<input class="form-control" type="text" name="nm_kendaraan">					
				</div>
				<div class="form-group">
					<label>Tipe Kendaraan</label>
					<input class="form-control" type="text" name="tipe_kendaraan">					
				</div>
				<div class="form-group">
					<label>Pabrikan</label>
					<input class="form-control" type="text" name="pabrikan">					
				</div>
				<div class="form-group">
					<label>Harga</label>
					<input class="form-control" type="text" name="harga">					
				</div>
				<div class="form-group">
					<label>Jumlah Penumpang</label>
					<input class="form-control" type="text" name="total_penumpang">					
				</div>
				<div class="form-group">
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="status" value="1">Tersedia
							&nbsp;
							&nbsp;
							<input type="radio" class="form-check-input" name="status" value="0">Tidak Tersedia
						</label>
						</div>
				</div>
				<div class="form-group">
					<label for="exampleFormControlFile1">Gambar</label>
					<input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
				</div>
				<div class="card-footer">
					<input class="btn btn-info btn-block" type="submit" name="Simpan" value="Simpan">					
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
	include_once "footer.php";
	?>
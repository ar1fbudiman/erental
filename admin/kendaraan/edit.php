<?php 
  include_once "header.php"; ?>
		<?php 
		include "../../conn/koneksi.php";
		$id = $_GET['id'];
		if($_POST){
			if(isset($_POST['ubah_foto'])){
		// print_r($_POST['ubah_foto']);exit;
			if(isset($_FILES['gambar']['name']) && isset($_FILES['gambar']['tmp_name'])){
				$gambar = $_FILES['gambar']['name'];
				$tmp = $_FILES['gambar']['tmp_name'];
			
				$gambarbaru = $gambar;
				$path = "../../assets/img/mobil/".$gambarbaru;
			if(move_uploaded_file($tmp, $path)){
				// var_dump($_POST['ubah_foto']);exit;
				$sql = "UPDATE ref_kendaraan 
							SET 
								nm_kendaraan='".$_POST['nm_kendaraan']."', 
								tipe_kendaraan='".$_POST['tipe_kendaraan']."', 
								pabrikan='".$_POST['pabrikan']."',
								harga='".$_POST['harga']."',
								total_penumpang='".$_POST['total_penumpang']."',
								status='".$_POST['status']."',
								gambar='".$gambarbaru."'
							WHERE 
								id=".$id;
			}
				if ($koneksi->query($sql) === TRUE) {
					echo "<script>
					alert('Data berhasil di update');
					window.location.href='index.php';
					</script>";
				} else {
					echo "Gagal: " . $koneksi->error;
				}
				$koneksi->close();
			}else{
				// Jika gambar gagal diupload, Lakukan :
				echo $koneksi->error;

			}
				$koneksi->close();
  }else{
			$sql = "UPDATE ref_kendaraan 
					SET 
						nm_kendaraan='".$_POST['nm_kendaraan']."', 
						tipe_kendaraan='".$_POST['tipe_kendaraan']."', 
						pabrikan='".$_POST['pabrikan']."',
						harga='".$_POST['harga']."',
						total_penumpang='".$_POST['total_penumpang']."',
						status='".$_POST['status']."' 
					WHERE 
						id=".$id;
			}
			if ($koneksi->query($sql) === TRUE) {
			   echo "<script>
			   alert('Data berhasil di update');
			   window.location.href='index.php';
			   </script>";
			} else {
			   echo "Gagal: " . $koneksi->error;
			}
			$koneksi->close(); 
	}else{
		$data = mysqli_query($koneksi,"SELECT * FROM ref_kendaraan WHERE id=".$id);
		$d = mysqli_fetch_array($data);
	}
		?>
		<div class="col-md-12">
		<!-- Default box -->
		<div class="card">
        <div class="card-header">
          <h3 class="card-title">Ubah Data Kendaraan</h3>
        </div>
        <div class="card-body">
		<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group">
				<input class="form-control" type="hidden" name="id" value="<?php echo $d['id']; ?>">
			<div class="form-group">
				<label>Nama Kendaraan</label>
				<input class="form-control" type="text" name="nm_kendaraan" value="<?php echo $d['nm_kendaraan']; ?>">				
			</div>
			<div class="form-group">
				<label>Tipe Kendaraan</label>
				<input class="form-control" type="text" name="tipe_kendaraan" value="<?php echo $d['tipe_kendaraan']; ?>">				
			</div>
			<div class="form-group">
				<label>Pabrikan</label>
				<input class="form-control" type="text" name="pabrikan"value="<?php echo $d['pabrikan']; ?>">				
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input class="form-control" type="text" name="harga"value="<?php echo $d['harga']; ?>">				
			</div>
			<div class="form-group">
				<label>Banyak Penumpang</label>
				<input class="form-control" type="text" name="total_penumpang"value="<?php echo $d['total_penumpang']; ?>">				
			</div>
			<div class="form-group">
				<div class="form-check-inline">
					<label class="form-check-label">
					<?php if($d['status'] == 1){ ?>
						<input type="radio" class="form-check-input" name="status" value="1" checked>Tersedia
						<input type="radio" class="form-check-input" name="status" value="0">Tidak Tersedia
					<?php }else{ ?>
						<input type="radio" class="form-check-input" name="status" value="1">Tersedia
						<input type="radio" class="form-check-input" name="status" value="0" checked>Tidak Tersedia
					<?php } ?>
					</label>
					</div>
			</div>
			<div class="form-group">
				<label for="exampleFormControlFile1">Gambar</label>
				<input type="checkbox" name="ubah_foto" value="true"> Ubah Foto ?
				<input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
			</div>
			<div class="card-footer">
				<input class="btn btn-info btn-block" type="submit" name="Simpan" value="Simpan">	
			</div>			
		</form>
		</div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
<?php
  include_once "footer.php";
  ?>
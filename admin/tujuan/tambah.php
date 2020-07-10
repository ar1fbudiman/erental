<?php 
include_once "header.php";
require_once '../../conn/koneksi.php';

if($_POST){
    try {
       $sql = "INSERT INTO ref_tempat (id,keterangan) 
                VALUES ('".$_POST['id']."','".$_POST['keterangan']."')";
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }
    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         window.location.href='index.php';
         </script>";
}
//count id otomatis
$query = mysqli_query($koneksi,"SELECT max(id) FROM ref_tempat");
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
				<h3>Tambah Data Tempat</h3>
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="">
				<div class="form-group">
					<input type="hidden" name="id" value="<?=$kode?>">
				</div>
				<div class="form-group">
					<label for="">Keterangan</label>
					<input class="form-control" type="text" name="keterangan">
				</div>
		</div>
		<div class="card-footer">
			<input class="btn btn-info btn-block" type="submit" value="SIMPAN">
			</form>
		</div>
	</div>
</div>
	
	<?php 
		include_once "footer.php";
	?>
<?php 
	include_once "header.php";
	require_once '../../conn/koneksi.php';
    $id = $_GET['id'];

    if($_POST){
        $sql = "UPDATE ref_tempat SET keterangan='".$_POST['keterangan']."' WHERE id=".$id;
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
    $data = mysqli_query($koneksi,"SELECT * FROM ref_tempat WHERE id=".$id);
	$d = mysqli_fetch_array($data);
}
?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				<h3>Edit Data Tujuan</h3>
			</div>
		</div>
		<div class="card-body">
			<form method="post" action="">
				<input class="form-control" type="hidden" name="id" value="<?php echo $d['id']; ?>">
				<label for="">Keterangan</label>
				<input class="form-control" type="text" name="keterangan" value="<?php echo $d['keterangan']; ?>">
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
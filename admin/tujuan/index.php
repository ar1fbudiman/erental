<?php 
include_once "header.php";
?>
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				<a class="btn btn-success" href="tambah.php"><i class="fa fa-plus"></i> Tambah Data</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>#</th>
					<th>Keterangan</th>
					<th>Action</th>
				</tr>
				<?php 
				include '../../conn/koneksi.php';
				$no = 1;
				$data = mysqli_query($koneksi,"select * from ref_tempat");
				while($d = mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['keterangan']; ?></td>
						<td>
							<a class="btn btn-warning" href="edit.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
							<a class="btn btn-danger" href="hapus.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php 
				}
				?>
			</table>
		</div>
	</div>
</div>
	<?php 
	include_once "footer.php";
	?>
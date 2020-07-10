	<?php 
		include_once "header.php";
	?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<a class="btn btn-success btn-sm" href="input.php"><i class="fa fa-plus"></i> Tambah Data</a>
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Kendaraan</th>
						<th>Tipe Kendaraan</th>
						<th>Pabrikan</th>
						<th>Gambar</th>		
						<th>Harga</th>		
						<th>Status</th>	
						<th>Action</th>		
					</tr>
					</thead>
					<tbody>
						<?php 
						include "../../conn/koneksi.php";
						$data = mysqli_query($koneksi,"select * from ref_kendaraan");
						$nomor = 1;
						while($d = mysqli_fetch_array($data)){
							// var_dump($data);
						?>
						<tr>
							<td><?= $nomor++; ?></td>
							<td><?= $d['nm_kendaraan']; ?></td>
							<td><?= $d['tipe_kendaraan']; ?></td>
							<td><?= $d['pabrikan']; ?></td>
							<td><?= "<img src='../../assets/img/mobil/".$d['gambar']."' width='150' height='100'>" ?></td>
							<td><?= number_format($d['harga'],0,'.','.'); ?></td>
							<td align="center">
							<?php 
							if ($d['status'] == 1) { ?>
								<span class="badge badge-success">Tersedia</span>
							<?php }else{ ?>
								<span class="badge badge-danger">Tidak Tersedia</span>
							<?php } ?>
							</td>
					
							<td>
							<a class="btn btn-success btn-sm btn-block" href="edit.php?id=<?= $d['id']; ?>"><i class="fa fa-pencil"></i></a>
								<a class="btn btn-danger btn-sm btn-block" href="hapus.php?id=<?= $d['id']; ?>"><i class="fa fa-trash"></i></a>					
							</td>
						</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<?php
  include_once "footer.php";
  ?>

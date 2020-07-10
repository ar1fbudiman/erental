<?php include_once "header.php"; 
?>
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <div class="card-title">
    <h1 class="text-center">Pembayaran DiTerima</h1>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Kendaraan</th>
                <th>Tujuan</th>
                <th>Lama Pergi</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once '../conn/koneksi.php';
                $data = mysqli_query($koneksi,"SELECT ta_reservasi.*, ref_kendaraan.*, ref_tempat.*, ta_pembayaran.*, ta_reservasi.status AS status_reservasi
                FROM ta_pembayaran
                INNER JOIN ta_reservasi ON ta_pembayaran.id_reservasi = ta_reservasi.id
                INNER JOIN ref_tempat ON ta_reservasi.id_tempat = ref_tempat.id
                INNER JOIN ref_kendaraan ON ta_reservasi.id_kendaraan = ref_kendaraan.id 
                WHERE ta_reservasi.status=1");
                $row = mysqli_num_rows($data);
                $no = 1;
                if($row > 0){
                foreach($data as $reservasi){
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$reservasi['nm_kendaraan']?></td>
                <td><?=$reservasi['keterangan']?></td>
                <td><?=$reservasi['lama_pergi']?> Hari</td>
                <td><?=number_format($reservasi['total'],0,'.','.')?></td>
                <td class="text-center"><span class="badge badge-success">Pembayaran DiTerima</span></td>
            </tr>
                <?php }} ?>
        </tbody>
    </table>
    </div>
</div>
</div>
 <!-- /.row -->
 </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once "footer.php"; ?>
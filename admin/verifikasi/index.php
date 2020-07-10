<?php include_once "header.php"; 
?>
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <div class="card-title">
    <h1 class="text-center">Konfirmasi Pembayaran</h1>
        </div>
    </div>
    <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Pengirim</th>
                <th>Kendaraan</th>
                <th>Tujuan</th>
                <th>Lama Pergi</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once '../../conn/koneksi.php';
                $data = mysqli_query($koneksi,"SELECT ta_reservasi.*, ref_kendaraan.*, ref_tempat.*, ta_pembayaran.*, ta_reservasi.status AS status_reservasi
                                                FROM ta_pembayaran
                                                INNER JOIN ta_reservasi ON ta_pembayaran.id_reservasi = ta_reservasi.id
                                                INNER JOIN ref_tempat ON ta_reservasi.id_tempat = ref_tempat.id
                                                INNER JOIN ref_kendaraan ON ta_reservasi.id_kendaraan = ref_kendaraan.id 
                                                WHERE ta_reservasi.status = 3");
                $row = mysqli_num_rows($data);
                $no = 1;
                if($row > 0){
                foreach($data as $reservasi){
            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$reservasi['nama_pengirim']?></td>
                <td><?=$reservasi['nm_kendaraan']?></td>
                <td><?=$reservasi['keterangan']?></td>
                <td><?=$reservasi['lama_pergi']?> Hari</td>
                <td><?=number_format($reservasi['total'],0,'.','.')?></td>
                <?php if($reservasi['status_reservasi'] == 3){ ?>
                <td class="text-center"><span class="badge badge-info">Menunggu Konfirmasi</span></td>
                <?php }else if($reservasi['status_reservasi'] == 1){ ?>
                <td class="text-center"><span class="badge badge-success">Pembayaran DiTerima</span></td>
                <?php }else{?>
                <td class="text-center"><span class="badge badge-danger">Pembayaran DiTolak</span></td>
                <?php } ?>
                <?php if($reservasi['status_reservasi'] == 3){ ?>
                <td class="text-center">
                <a class="btn btn-block btn-success" href="proses-terima.php?id_reservasi=<?=$reservasi['id']?>">Konfirmasi</a>
                <a class="btn btn-block btn-danger" href="proses-tolak.php?id_reservasi=<?=$reservasi['id']?>">Tolak</a>
                </td>
                <?php }else{ 
                    echo '<td></td>';
                }    
                ?>
            </tr>
                <?php }} ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<?php include_once "footer.php"; ?>
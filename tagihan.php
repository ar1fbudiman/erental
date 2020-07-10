<?php include_once "header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Konfirmasi Pembayaran</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
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
                        require_once 'conn/koneksi.php';
                        $username = $_SESSION['username'];
                        $login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
                        $dataLogin = mysqli_fetch_assoc($login);
                        $data = mysqli_query($koneksi,"SELECT ref_kendaraan.nm_kendaraan, ref_tempat.keterangan, ta_reservasi.*
                                                        FROM ta_reservasi
                                                        INNER JOIN ref_kendaraan ON ta_reservasi.id_kendaraan = ref_kendaraan.id
                                                        INNER JOIN ref_tempat ON ta_reservasi.id_tempat = ref_tempat.id 
                                                        WHERE id_user = '$dataLogin[id]'");
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
                        <?php if($reservasi['status'] == 2){ ?>
                        <td class="text-center"><span class="badge badge-warning">Menunggu Pembayaran</span></td>
                        <?php }else if($reservasi['status'] == 3){ ?>
                        <td class="text-center"><span class="badge badge-info">Sedang DiVerifikasi</span></td>
                        <?php }else if($reservasi['status'] == 1){ ?>
                        <td class="text-center"><span class="badge badge-success">Pembayaran DiTerima</span></td>
                        <?php }else{?>
                        <td class="text-center"><span class="badge badge-danger">Pembayaran DiTolak</span></td>
                        <?php } ?>
                        <?php if($reservasi['status'] == 2){ ?>
                        <td class="text-center"><a class="btn btn-primary" href="pembayaran.php?id_reservasi=<?=$reservasi['id']?>"><i class="fa fa-money"></i> Konfirmasi</a></td>
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
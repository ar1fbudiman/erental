<?php
    include_once "header.php";
?>
<!-- Body -->
<div style="margin-top:25px" class="container">
<div class="row">
    <?php
        require_once 'conn/koneksi.php';
        $data = mysqli_query($koneksi,"SELECT * FROM ref_kendaraan");
        $row = mysqli_num_rows($data);

        if($row > 0){
        foreach($data as $kendaraan){
    ?>
    <div class="col-md-4">
        <div class="card-deck">
            <div class="card"  style="margin-top:20px;">
            <?= "<img src='assets/img/mobil/".$kendaraan['gambar']."' class='card-img-top' width='223' height='200' name='foto'>" ?>
                <div class="card-body">
                <h5 class="card-title"><?=$kendaraan['nm_kendaraan']?></h5>
                <p class="card-text">Tipe : <?=$kendaraan['tipe_kendaraan']?><br>Pabrikan : <?=$kendaraan['pabrikan']?><br>Maksimum Penumpang : <?=$kendaraan['total_penumpang']?><br>Harga Sewa : Rp. <?=number_format($kendaraan['harga'])?></p>
                </div>
                <div class="card-footer">
                    <?php
                        if($kendaraan['status'] == 1){
                    ?>
                <small class="text-muted">Status : <span class="badge badge-info">Tersedia</span></small>
                <a style="float:right" class="btn btn-warning btn-sm" href="reservasi.php?id_kendaraan=<?=$kendaraan['id']?>"><i class="fa fa-handshake-o" aria-hidden="true"></i> Sewa Mobil</a>
                <?php
                        }else{
                            ?>
                <small class="text-muted">Status : <span class="badge badge-danger">Tidak Tersedia</span></small>
                            <?php
                        }  
                ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php }
}?>
</div>
</div>
<?php 
    include_once "footer.php";
?>
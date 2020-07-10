<?php 
include_once "header.php";
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
    <div class="media">
    <?php
      include 'conn/koneksi.php';
      $id_kendaraan = $_GET['id_kendaraan'];
      $data = mysqli_query($koneksi,"SELECT * FROM ref_kendaraan WHERE id = '$id_kendaraan'");
      $kendaraan = mysqli_fetch_array($data);

    //   var_dump($data);exit;
      // var_dump($id);exit;
    //   $row = mysqli_num_rows($data);
      foreach($data as $detail){

    // $detail = mysqli_fetch_assoc($data);
    ?>
        <?="<img class='align-self-start mr-3 mt-5' src='assets/img/mobil/".$detail['gambar']."' width='300' height='300' name='foto'>"?>
        <div class="media-body">
            <h5 class="mt-5"><?=$detail['nm_kendaraan']?></h5>
            <hr>
            <p> 
            <strong>Biaya</strong> : <?=number_format($detail['harga'],0,'.','.')?> / Hari <br>
            <strong>Total Penumpang</strong> : <?=$detail['total_penumpang']?> Orang
            </p>
            <?php 
      }?>
            <p>
            <strong>Syarat dan Ketentuan:</strong>
            <ul>
            <li>Antar jemput Bandara biaya sudah All Inn (tidak ada lagi tambahan biaya bahan bakar, driver, parkir)</li>
            <li>Pemakaian mobil tidak boleh keluar dari area Sumatera Barat</li>
            <li>Pemakaian semua paket tidak melebihi jam 24:00 pada tanggal tersebut, lewat dari itu dikenakan biaya pemakaian per jam 10% dari sewa</li>
            <li>Jam kerja supir hanya sampai jam 24:00 pada tanggal tersebut. Jika lewat dari jam 24:00 / sudah berganti tanggal, maka akan dikenakan charge sejumlah Rp 50.000,-</li>
            <li>Harga belum termasuk uang makan Sopir sebesar Rp 50.000/hari</li>
            <li>Pemakaian luar kota (menginap) wajib diberitahukan/dikonfirmasikan terlebih dahulu kepada pihak operational Menjelajah Rental. Untuk outtown / pemakaian luar kota belum termasuk biaya menginap dikenakan OLC (Overnight Lodging Cost) atau biaya menginap sopir Rp 150.000/malam</li>
            <li>Biaya kelebihan pemakaian diserahkan kepada Sopir Menjelajah Rental sesuai dengan jumlah pemakaian</li>
            <li>Dalam kondisi tertentu Menjelajah Rental dapat mengganti kendaraan yang telah dipesan dengan kendaraan yang setipe atau satu level diatasnya (tanpa dikenakan tambahan charging) bergantung ketersedian unit tanpa pemberitahuan terlebih dahulu</li>
            <li>Menjelajah Rental berhak untuk membatalkan sewa apabila konsumen dianggap tidak memenuhi syarat sebagai penyewa dan apabila rute yang ditempuh konsumen di luar dari Provinsi Sumatera Barat.</li>
            <li>Penyewa tidak dibenarkan merubah kota tujuan / memperpanjang waktu sewa tanpa pemberitahuan.</li>
            <li>Kehilangan dan kerusakan barang selama perjalanan di luar tanggung jawab Menjelajah Rental.</li>
            <li>Menjelajah Rental menyediakan layanan Servis di 0751 – 810883</li>
            <li>Jika ada perubahan jadwal & Lokasi penjemputan harus menginformasikan sebelumnya ke Customer Service Menjelajah Rental.</li>
            </ul>
            </p>
        </div>
    </div>
</div>
<div class="col-md-12">
<?php
if($_POST){
  $username = $_SESSION['username'];
  $login = mysqli_query($koneksi,"SELECT id FROM user WHERE username='$username'");
        $data = mysqli_fetch_assoc($login);
        // var_dump($data['id']);exit;
    try {
       $sql = "INSERT INTO ta_reservasi (
           id,
           id_kendaraan,
           id_user,
           id_tempat,
           lama_pergi,
           total,
           status
           ) 
                VALUES (
                    '".$_POST['id']."',
                    '".$id_kendaraan."',
                    '".$data['id']."',
                    '".$_POST['id_tempat']."',
                    '".$_POST['lama_pergi']."',
                    '".$_POST['total']."',
                    2
                    )";
        
       if(!$koneksi->query($sql)){
          echo $koneksi->error;
          die();
        }

        $sqlupdate = "UPDATE ref_kendaraan 
        SET 
            status = 0
        WHERE 
            id=".$id_kendaraan;

        if(!$koneksi->query($sqlupdate)){
            echo $koneksi->error;
            die();
          }
    } catch (Exception $e) {
      echo $e;
      die();
    }
    echo "<script>
         window.location.href='tagihan.php';
         </script>";
}
//count id otomatis
$query = mysqli_query($koneksi,"SELECT max(id) FROM ta_reservasi");
        $no = mysqli_fetch_array($query);
        if ($no) {
            $nomor = $no[0];
            $kode = (int) $nomor;
            $kode = $kode + 1;
        }else{
            $kode = '1';
        }
        ?>
    <?php if(isset($_SESSION['username']) == NULL){ ?>
        <div class="card">
            <div class="card-body">
                <h3>Silahkan <a class="btn btn-sm btn-info" href="login.php">login</a> terlebih dahulu untuk menyewa mobil ini.</h3>
            </div>
        </div>
    <?php }else{ ?>
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				<h3>Reservasi Sekarang</h3>
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="">
				<div class="form-group">
					<input type="hidden" name="id" value="<?=$kode?>">
				</div>
				<div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">Tujuan</label>
                            <select class="form-control" id="tempat" name="id_tempat">
                                <option value="">-PILIH-</option>
                                <?php 
                                    $data = mysqli_query($koneksi,"SELECT * FROM ref_tempat");
                                    foreach ($data as $tempat) {
                                ?>
                                <option value="<?=$tempat['id']?>"><?=$tempat['keterangan']?></option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="lama_pergi">Lama Pergi</label>
                            <select class="form-control" id="lama_pergi" name="lama_pergi" onchange="hitung()">
                                <option value="">-PILIH-</option>
                                <?php 
                                    for ($i = 1; $i <= 31; $i++) {
                                ?>
                                <option value="<?=$i?>"><?=$i?> Hari</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
					<input class="form-control" type="hidden" id="biaya" name="biaya" value="<?=$kendaraan['harga']?>" readonly>
                    <label for="biaya">Total Biaya Perjalanan</label>
					<input class="form-control" type="text" id="total" name="total" readonly>
				</div>
		</div>
		<div class="card-footer">
			<input class="btn btn-secondary btn-block" type="submit" value="CHECKOUT">
			</form>
		</div>
	</div>
</div>
</div><!-- row -->
</div><!-- container -->
<?php } ?>
<script>
function hitung() {
    // alert ($("#lama_pergi").val());
    var lama_pergi = $("#lama_pergi").val();
    var biaya = $("#biaya").val();
    
    // if (isNaN(lama_pergi)) 
    //     {
    //         alert("Harus Menginput Angka");
    //         return false;
    //     }
    total = lama_pergi * biaya; //a kali b
    // var value = total.toLocaleString(
    //     undefined, // leave undefined to use the browser's locale,
    //                 // or use a string like 'en-US' to override it.
    //     { minimumFractionDigits: 0 }
    // );
    $("#total").val(total);
}
</script>
<?php 
include_once "footer.php";
?>
<?php
  include_once "header.php";
  ?>
  <?php 
  include '../conn/koneksi.php';

  if(isset($_SESSION['username']) == NULL && isset($_SESSION['level']) != "admin"){ 
    echo "<script>
    window.location.href='warning.php';
    </script>";
?>
<?php
}else{
  $dataKendaraan = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM ref_kendaraan");
  $dataTujuan = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah2 FROM ref_tempat");
  $dataUser = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah3 FROM user WHERE level='customer'");
  $dataKendaraanTotal = mysqli_fetch_array($dataKendaraan);
  // var_dump($dataKendaraanTotal);exit;
  $dataTujuanTotal = mysqli_fetch_assoc($dataTujuan);
  $dataUserTotal = mysqli_fetch_assoc($dataUser);
  
  // var_dump($dataUser);exit;
  ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$dataKendaraanTotal['jumlah'];?></h3>

                <p>Mobil</p>
              </div>
              <div class="icon">
              <i class="fa fa-car" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$dataTujuanTotal['jumlah2'];?></h3>

                <p>Tujuan</p>
              </div>
              <div class="icon">
              <i class="fa fa-road" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$dataUserTotal['jumlah3'];?></h3>

                <p>User Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php } ?>
  <?php
  include_once "footer.php";
  ?>

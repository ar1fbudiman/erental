<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$keterangan = $_POST['keterangan'];

// menginput data ke database
mysqli_query($koneksi,"insert into ref_tempat values('','$keterangan')");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
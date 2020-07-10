<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$keterangan = $_POST['keterangan'];

// update data ke database
mysqli_query($koneksi,"update ref_tempat set keterangan='$keterangan' where id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
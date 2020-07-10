<?php 
// koneksi database
include '../../conn/koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM ref_tempat WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>
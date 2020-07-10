<?php 
$koneksi = new mysqli("127.0.0.1","root","","kelompok5");
 
// Check connection
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} 
?>
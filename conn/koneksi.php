<?php 
$koneksi = new mysqli("127.0.0.1","root","mysql123","erental");
 
// Check connection
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} 
?>
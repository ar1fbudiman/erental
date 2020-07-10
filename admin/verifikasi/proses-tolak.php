<?php
require_once '../../conn/koneksi.php';
if(isset($_GET['id_reservasi'])){
	$id_reservasi = $_GET['id_reservasi'];
	// print_r($_GET['id']);exit;
	}
	try {
		$sql ="UPDATE ta_reservasi SET status='10' WHERE id=".$id_reservasi;
		if(!$koneksi->query($sql)){
		   echo $koneksi->error;
		   die();
		 }
	 } catch (Exception $e) {
	   echo $e;
	   die();
	 }
	 header("Location: index.php");
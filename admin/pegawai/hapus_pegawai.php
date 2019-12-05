<?php
	if (isset($_GET['id'])){
		include 'koneksi.php';
		$id = $_GET['id'];
		$res = mysqli_query($koneksi,"delete from kasir where id_kasir = '$id'");
		if($res){ //berhasil
			header('location: pegawai.php');
		}
		else{ //gagal
			echo "hapus pegawai gagal<br>";
			header('location: pegawai.php');
		}
	} else {
		header('location:pegawai.php');
	}
?>
<?php
	if (isset($_GET['id'])){
		include 'koneksi.php';
		$id = $_GET['id'];
		$res = mysqli_query($koneksi,"delete from pegawai where id_pegawai = '$id'");
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
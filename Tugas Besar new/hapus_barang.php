<?php
	if (isset($_GET['id_barang'])){
		include 'koneksi.php';
		$id = $_GET['id_barang'];
		$res = mysqli_query($koneksi,"delete from barang where idbarang = '$id'");
		if($res){ //berhasil
			header('location: produk.php');
		}
		else{ //gagal
			echo "hapusproduk gagal<br>";
			header('location: produk.php');
		}
	} else {
		header('location:produk.php');
	}
?>
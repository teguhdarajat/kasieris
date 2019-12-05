<?php
	if (isset($_GET['id'])){
		include 'koneksi.php';
		$id = $_GET['id'];
		$res = mysqli_query($koneksi,"delete from barang where idbarang = '$id'");
		$filename = "qrcode/".$_GET['id'].".png";
		unlink($filename);
		if($res){ //berhasil
			header('location: /admin/produk/produk.php');
		}
		else{ //gagal
			echo "hapusproduk gagal<br>";
			header('location: produk.php');
		}
	} else {
		header('location:produk.php');
	}
?>
<?php
session_start();
	if (isset($_POST['id-produk'])){		
		include $_SERVER['DOCUMENT_ROOT'].'/admin/phpqrcode/qrlib.php';
		include 'koneksi.php';
		$id = $_POST['id-produk'];
		$nama = $_POST['nama-produk'];
		$harga = $_POST['harga-produk'];
		$stok = $_POST['stok-produk'];
		$supplier = $_POST['supplier-produk'];
		$idadmin = $_SESSION['idadmin'];
		$res = mysqli_query($koneksi,"insert into barang values('$id','$nama','$harga','$stok','$idadmin', '$supplier')");
		if($res){ //berhasil
			echo "tambah barang berhasil<br>";
			QRcode::png($id, "qrcode/".$id.".png", "L", 4, 4);
			header('location:/admin/produk/produk.php');
		}
		else{ //gagal
			echo "tambah barang gagal<br>";
			mysqli_error($koneksi);
			header('location:/admin/produk/produk.php');
		}
	} else {
		header('location:/admin/produk/produk.php');
	}
	mysqli_close($conn);
	// header('location:viewproduk.php');
?>
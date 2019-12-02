<?php
	if (isset($_POST['id-produk'])){
		include 'koneksi.php';
		$id = $_POST['id-produk'];
		$nama = $_POST['nama-produk'];
		$harga = $_POST['harga-produk'];
		$stok = $_POST['stok-produk'];
		$supplier = $_POST['supplier-produk'];
		$res = mysqli_query($koneksi,"insert into barang values('$id','$nama','$harga','$stok')");
		if($res){ //berhasil
			echo "tambah barang berhasil<br>";
			header('location:produk.php');
		}
		else{ //gagal
			echo "tambah barang gagal<br>";
			mysqli_error($koneksi);
			header('location:produk.php');
		}
	} else {
		header('location:produk.php');
	}
	mysqli_close($conn);
	// header('location:viewproduk.php');
?>
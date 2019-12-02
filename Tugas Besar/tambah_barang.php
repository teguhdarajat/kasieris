<?php
	if (isset($_POST['id_barang'])){
			include 'koneksi.php';
		$id = $_POST['id_barang'];
		$nama = $_POST['nama_barang'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$res = mysqli_query($koneksi,"insert into barang values ('$id','$nama','$harga','$stok')");
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
<?php
	if (isset($_POST['id_barang'])){
			include 'koneksi.php';
		$id = $_POST['id_barang'];
		$res = mysqli_query($koneksi,"select *from barang where idbarang=$id");
		if($res){ //berhasil
			echo "Barang Berhasil di input<br>";
			header('location:kasir.php');
		}
		else{ //gagal
			echo "Barang Berhasil di input<br>";
			mysqli_error($conn);
			header('location:kasir.php');
			
	} else {
		echo "Barang Habis";
		header('location:kasir.php');
	}
	mysqli_close($koneksi);
?>
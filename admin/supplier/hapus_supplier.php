<?php
	if (isset($_GET['id'])){
		include 'koneksi.php';
		$id = $_GET['id'];
		$res = mysqli_query($koneksi,"delete from supplier where idsupplier = '$id'");
		if($res){ //berhasil
			header('location: supplier.php');
		}
		else{ //gagal
			echo "hapus supplier gagal<br>";
			header('location: supplier.php');
		}
	} else {
		header('location:supplier.php');
	}
?>
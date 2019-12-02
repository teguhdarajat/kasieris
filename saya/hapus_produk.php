<?php
	if (isset($_GET['id'])){
		include 'conn.php';
		$id = $_GET['id'];
		$res = mysqli_query($conn,"delete from produk where id_produk = '$id'");
		if($res){ //berhasil
			header('location: viewproduk.php');
		}
		else{ //gagal
			echo "hapusproduk gagal<br>";
			echo "<a href='viewproduk.php'>kembali</a>";
		}
	} else {
		header('location:viewproduk.php');
	}
?>
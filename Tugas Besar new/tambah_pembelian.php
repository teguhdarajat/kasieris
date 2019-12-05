<?php
	if (isset($_POST['id_produk'])){
			include 'conn.php';
		$id = $_POST['id_produk'];
		$nama = $_POST['nama_produk'];
		$harga = $_POST['harga'];
		$res = mysqli_query($conn,"insert into produk values ('$id','$nama','$harga','$gmbr')");
		// if($res){ //berhasil
		// 	echo "tambah produk berhasil<br>";
		// 	echo "<a href='viewproduk.php'>view produk</a>";
		// }
		// else{ //gagal
		// 	echo "tambah produk gagal<br>";
		// 	mysqli_error($conn);
		// 	echo "<a href='formtambahproduk.php'>kembali</a>";
		// }
	} else {
		header('location:formtambahproduk.php');
	}
	mysqli_close($conn);
	// header('location:viewproduk.php');
?>
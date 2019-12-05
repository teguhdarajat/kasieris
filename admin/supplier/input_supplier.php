<?php
	if (isset($_POST['id-supplier'])){
		include 'koneksi.php';
		$id = $_POST['id-supplier'];
		$nama = $_POST['nama-supplier'];
		$alamat = $_POST['alamat-supplier'];
		$no = $_POST['nomor-supplier'];
		$email = $_POST['email-supplier'];
		$res = mysqli_query($koneksi,"insert into supplier values ('$id','$nama','$alamat','$no','$email')");
		if($res){ //berhasil
			echo "tambah supplier berhasil<br>";
			header('location:supplier.php');
		}
		else{ //gagal
			echo "tambah supplier gagal<br>";
			mysqli_error($koneksi);
			header('location:supplier.php');
		}
	} else {
		header('location:supplier.php');
	}
	mysqli_close($conn);
	// header('location:viewproduk.php');
?>
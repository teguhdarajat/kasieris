<?php
	if (isset($_GET['id'])){
		include 'koneksi.php';
		$id = $_GET['id'];
		$res = mysqli_query($koneksi,"delete from admin where id_admin = '$id'");
		if($res){ //berhasil
			header('location: admin.php');
		}
		else{ //gagal
			echo "hapus admin gagal<br>";
			header('location: admin.php');
		}
	} else {
		header('location:admin.php');
	}
?>
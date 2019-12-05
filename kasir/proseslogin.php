<?php
	session_start();
	if (isset($_POST['id_kasir'])) {
		$id = $_POST['id_kasir'];
		$pass = $_POST['password'];
		include 'koneksi.php';
		$res = mysqli_query($koneksi,"select * from kasir where id_kasir = '$id'");
		if ($data = mysqli_fetch_array($res)) {

			if ($data['password']==$pass){
				$_SESSION['login_kasir'] = $data['id_kasir'];
				$_SESSION['foto'] = base64_encode($data['image']);
				$_SESSION['nama_kasir'] = $data['nama_kasir'];
				header('location:/kasir/index.php');
			}else { //password salah
				$_SESSION['pesan'] = 'password salah';
				header('location:login_kasir.php');
			}

		}else { //username tidak ada
			$_SESSION['pesan'] = 'username tidak ada';
			header('location:login_kasir.php');
		}
	}else {
		echo "yayya";
		// header('location:login_kasir.php');
	}

?>
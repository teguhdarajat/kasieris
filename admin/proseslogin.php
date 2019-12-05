<?php
	session_start();
	if (isset($_POST['id_kasir'])) {
		$id = $_POST['id_kasir'];
		$pass = $_POST['password'];
		include 'koneksi.php';
		$res = mysqli_query($koneksi,"select * from admin where id_admin = '$id'");
		if ($data = mysqli_fetch_array($res)) {

			if ($data['password']==$pass){
				$_SESSION['login'] = $data['nama_admin'];
				$_SESSION['foto'] = base64_encode($data['foto']);
				$_SESSION['idadmin'] = $data['id_admin'];
				header('location:/admin/index.php');
			}else { //password salah
				$_SESSION['pesan'] = 'password salah';
				header('location:/admin/login_admin.php');
			}

		}else { //username tidak ada
			$_SESSION['pesan'] = 'username tidak ada';
			header('location:/admin/login_admin.php');
		}
	}else {
		echo "yayya";
		// header('location:/admin/login_admin.php');
	}

?>
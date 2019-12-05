<?php
	session_start();
	if (isset($_POST['id_admin'])) {
		$id = $_POST['id_admin'];
		$pass = $_POST['password'];
		include 'koneksi.php';
		$res = mysqli_query($koneksi,"select * from admin where id_admin = '$id'");
		if ($data = mysqli_fetch_array($res)) {

			if ($data['password']==$pass){
				$_SESSION['login'] = $data['id_admin'];
				header('location:index.php');
			}else { //password salah
				$_SESSION['pesan'] = 'password salah';
				header('location:login_admin.php');
			}

		}else { //username tidak ada
			$_SESSION['pesan'] = 'username tidak ada';
			header('location:login_admin.php');
		}
	}else {
		echo "yayya";
		// header('location:login_admin.php');
	}

?>
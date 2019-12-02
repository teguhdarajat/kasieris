<?php
	session_start();
	if (isset($_POST['id_pegawai'])) {
		$id = $_POST['id_pegawai'];
		$pass = $_POST['password'];
		include 'koneksi.php';
		$res = mysqli_query($koneksi,"select *from pegawai where id_pegawai = '$id'");
		if ($data = mysqli_fetch_array($res)) {

			if ($data['password']==$pass){
				$_SESSION['login'] = $data['nama_pegawai'];
				$_SESSION['foto'] = base64_encode($data['image']);
				$_SESSION['idpegawai'] = $id;
				header('location:index.php');
			}else { //password salah
				$_SESSION['pesan'] = 'password salah';
				header('location:login_keryawan.php');
			}

		}else { //username tidak ada
			$_SESSION['pesan'] = 'username tidak ada';
			header('location:login_keryawan.php');
		}
	}else {
		echo "yayya";
		// header('location:login_keryawan.php');
	}

?>
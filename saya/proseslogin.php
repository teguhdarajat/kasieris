<?php
	session_start();
	if (isset($_POST['username'])) {
		$user = $_POST['username'];
		$pass = sha1($_POST['password']);
		include 'conn.php';
		$res = mysqli_query($conn,"select *from user where username = '$user'");
		if ($data = mysqli_fetch_array($res)) {

			if ($data['password']==$pass){
				$_SESSION['login'] = $data['username'];
				header('location:viewproduk.php');
			}else { //password salah
				$_SESSION['pesan'] = 'password salah';
				header('location:login_page.php');
			}

		}else { //username tidak ada
			$_SESSION['pesan'] = 'username tidak ada';
			header('location:login_page.php');
		}
	}else {
		header('location:login_page.php');
	}

?>
<?php
	session_start();
	if (!isset($_SESSION['login_kasir'])) //value login belum ada, artinya belum login
		header('location:/kasir/login_kasir.php');
?>

<!-- Uname: asldasl password: asjdasljd-->
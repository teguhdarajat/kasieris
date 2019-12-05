<?php
	session_start();
	if (!isset($_SESSION['login_kasir'])) //value login belum ada, artinya belum login
		header('location:login_kasir.php');
?>
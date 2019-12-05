<?php
	session_start();
	if (!isset($_SESSION['login'])) //value login belum ada, artinya belum login
		header('location:/admin/login_admin.php');
?>

<!-- Uname: asldasl password: asjdasljd-->
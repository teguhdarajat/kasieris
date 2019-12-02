<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		form {width: 200px; margin: auto; border: solid 1px black; padding: 10px;margin-top: 100px;text-align: center}
		h2 {text-align: center}
	</style>
</head>
<body>
	<h2>Login </h2>
	<form method="POST" action="proseslogin.php">
		Username : <br>
		<input type="text" name="username"><br>
		Password : <br>
		<input type="text" name="password"><br>
		<br>
		<input type="submit" value="Login" name="">
		<br>
		<?php 
			session_start();
			if (isset($_SESSION['pesan']))
			echo $_SESSION['pesan'];
		 ?>
	</form>
</body>
</html>
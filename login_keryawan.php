<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<style>
		* {background-color: #dcffcc}
		form {width: 200px; margin: auto; border: solid 1px black; padding: 10px;text-align: center;background-color: white;border-radius: 10px}
		h2 {text-align: center;padding-top: 150px}
		input {background-color: white}
		.login {border-radius: 10px}

	</style>
</head>
<body>
	<h2>Login </h2>
	<form method="POST" action="proseslogin.php">
		ID Pegawai : <br>		
		<input type="text" name="id_pegawai"><br>
		Password : <br>
		<input type="password" name="password"><br>
		<br>
		<input type="submit" value="Login" class="login"
		 >
		<br>
		<?php 
			session_start();
			if (isset($_SESSION['pesan']))
			echo $_SESSION['pesan'];
		 ?>
	</form>
</body>
</html>
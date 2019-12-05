<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
    <div class="kiri">
    </div>
    <div class="kanan">
        <div class="konten-login">
            <h1>Halo,</h1>
            <h1>Selamat Datang</h1>
                <form method="POST" action="proseslogin.php">
		            ID Pegawai : <br>		
		            <input type="text" name="id_kasir"><br>
		            Password : <br>
		            <input type="password" name="password"><br>
		            <br>
		            <input type="submit" value="Login" class="tombol-primer" style="width: 84%">
		            <br>
		            <?php 
		            	session_start();
		            	if (isset($_SESSION['pesan']))
		            	echo $_SESSION['pesan'];
		             ?>
	            </form>
        </div>
    </div>
</body>
</html>
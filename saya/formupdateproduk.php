


<?php
 if (isset($_GET['id'])){
		//load form update
		include 'conn.php';
		$id = $_GET['id'];
		if (isset($_POST['id_produk'])){
			$id_p = $_POST['id_produk'];
			$nama = $_POST['nama_produk'];
			$harga = $_POST['harga'];
		
			$yu = mysqli_query($conn,"update produk set id_produk='$id_p',nama_produk='$nama',harga='$harga' where id_produk='$id'");
			if($yu){ //berhasil
				echo "Ubah produk berhasil<br>";
				echo "<a href='viewproduk.php'>view produk</a>";
			}
			else{ //gagal
				echo "Ubah produk gagal<br>";
				echo "<a href='formupdateproduk.php'>kembali</a>";
			}
			//submit perubahan
		}else{
			$res = mysqli_query($conn,"select *from produk where id_produk= '$id' ");
		if($data = mysqli_fetch_array($res)){ 
			//data ada

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah Produk</title>
</head>
<body>
	<h2>Ubah Produk </h2>
	<form method="POST">
		ID Produk : <br>
		<input type="text" name="id_produk" value="<?php echo $data['id_produk'];?>"><br>
		Nama Produk : <br>
		<input type="text" name="nama_produk" value="<?php echo $data['nama_produk'];?>"><br>
		Harga Produk :<br>
		<input type="text" name="harga" value="<?php echo $data['harga'];?>">
		<br><br>
		<input type="submit" value="Ubah">
	</form>
</body>
</html>

<?php

		}else{ //gagal
			echo "update produk gagal<br>";
			echo "<a href='viewproduk.php'>kembali</a>";
		}
	}
	} else {
		header('location:viewproduk.php');
	}
?>

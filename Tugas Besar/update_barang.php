<?php
 if (isset($_GET['data'])){
		//load form update
		include 'koneksi.php';
		$id = $_GET['data'];
		if (isset($_POST['id_barang'])){
		$id_p = $_POST['id_barang'];
		$nama = $_POST['nama_barang'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
			$yu = mysqli_query($koneksi,"update barang set idbarang='$id_p',nama_barang='$nama',harga='$harga',stok='$stok'");
			if($yu){ //berhasil
				echo "Update barang berhasil<br>";
				header('location:produk.php');
			}
			else{ //gagal
				echo "Update barang gagal<br>";
				header('location:produk.php');	
			}
			//submit perubahan
		}else{
			$res = mysqli_query($conn,"select *from barang where id= '$id' ");
		if($data = mysqli_fetch_array($res)){ 
			//data ada

?>

<!-- <!DOCTYPE html>
<html>
<head>
	<title>Ubah Pegawai</title>
</head>
<body>
	<h2>Ubah Pegawai </h2>
	<form method="POST">
		ID: <br>
		<input type="text" name="id" value="<?php echo $data['id'];?>"><br>
		Nama Pegawai : <br>
		<input type="text" name="nama" value="<?php echo $data['nama'];?>"><br>
		Shift Kerja :<br>
		<input type="radio" name="shift" value="<?php echo 'Pagi'?>">Pagi
		<input type="radio" name="shift" value="<?php echo 'Siang'?>">Siang
		<input type="radio" name="shift" value="<?php echo 'Sore'?>">Sore
		<input type="radio" name="shift" value="<?php echo 'Malam'?>">Malam
		<br><br>
		<input type="submit" value="Ubah">
	</form>
</body>
</html>
 --> 
 <!-- "Form Update Barang" -->
<?php

		}else{ //gagal
			echo "Update barang gagal<br>";
				header('location:produk.php');	
		}
	}
	} else {
		header('location:produk.php');
	}
?>
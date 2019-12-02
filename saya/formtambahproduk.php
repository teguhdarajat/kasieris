<!DOCTYPE html>
<html>
<head>
	<title>Tambah Produk</title>
</head>
<body>
	<h2>Tambah produk Baru </h2>
	<form method="POST" action="tambah_produk.php" enctype="multipart/form-data">
		ID Produk : <br>
		<input type="text" name="id_produk"><br>
		Nama Produk : <br>
		<input type="text" name="nama_produk"><br>
		Harga Produk :<br>
		<input type="text" name="harga"><br>
		Gambar :<br>
		<input type="file" name="gambar"><br>
		<br>
		<input type="submit" value="Tambah" name="">
	</form>
</body>
</html>
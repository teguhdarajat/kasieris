<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
</head>
<body>
		<h2>Pembayaran</h2>
	<form method="POST" action="data_pembelian.php" enctype="multipart/form-data">
		ID barang : <br>
		<input type="text" name="id_barang"><br><br>
		<input type="submit" value="Tambah" name="">
	</form>
</body>
</html>

<?php include 'cek_login.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar barang</title>
</head>
<body>
	<div style="float: right; margin-right: 50px">
		Halo, <?php echo $_SESSION['login']; ?>
		&nbsp; &nbsp;
		<a href="loguot.php"><button>Logout</button></a>
	</div>
	<h2>Daftar barang</h2>
	<table border="1">
		<tr>
			<th>No</th>
			<th>ID barang</th>
			<th>Nama barang</th>
			<th>Harga barang</th>
			<th>Aksi</th>
		</tr>
		<?php
			include 'conn.php';
			$res = mysqli_query($conn,"select *from barang");
			$no=0;
			while ($data = mysqli_fetch_array($res)){
				$no++;
				echo "<tr>";
				echo "<td>".$no."</td>";
				echo "<td>".$data['id_barang']."</td>";
				echo "<td>".$data['nama_barang']."</td>";
				echo "<td align='right'>Rp. ".$data['harga']."</td>";
				echo "<td>";
				echo "<a href='formupdatebarang.php?id=".$data['id_barang']."'><button>ubah</button></a> &nbsp";
				echo "<button onclick='if(confirm(\"Yakin dihapus?\")) location.href=\"hapus_barang.php?id=".$data['id_barang']."\"'>Hapus</button>";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
	<br>

</body>
</html>
<?php include 'cek.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Produk</title>
</head>
<body>
	<div style="float: right; margin-right: 50px">
		Halo, <?php echo $_SESSION['login']; ?>
		&nbsp; &nbsp;
		<a href="loguot.php"><button>Logout</button></a>
	</div>
	<h2>Daftar Produk</h2>
	<table border="1">
		<tr>
			<th>No</th>
			<th>ID Produk</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Gambar</th>
			<th>Aksi</th>
		</tr>
		<?php
			include 'conn.php';
			$res = mysqli_query($conn,"select *from produk");
			$no=0;
			while ($data = mysqli_fetch_array($res)){
				$no++;
				echo "<tr>";
				echo "<td>".$no."</td>";
				echo "<td>".$data['id_produk']."</td>";
				echo "<td>".$data['nama_produk']."</td>";
				echo "<td align='right'>Rp. ".$data['harga']."</td>";
				echo "<td><img widht='200' src='data:image/jpg;base64,".base64_encode($data['image'])."'/></td>";
				echo "<td>";
				echo "<a href='formupdateproduk.php?id=".$data['id_produk']."'><button>ubah</button></a> &nbsp";
				echo "<button onclick='if(confirm(\"Yakin dihapus?\")) location.href=\"hapus_produk.php?id=".$data['id_produk']."\"'>Hapus</button>";
				echo "</td>";
				echo "</tr>";
			}
		?>
	</table>
	<br>
	<a href="formtambahproduk.php">Tambah Produk</a>

</body>
</html>
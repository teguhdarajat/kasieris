
<?php
	if (isset($_POST['id-pegawai'])){
		include 'koneksi.php';
		$id = $_POST['id-pegawai'];
		$nama = $_POST['nama-pegawai'];
		$shift = $_POST['shift-kerja'];
		$pass = $_POST['password'];
		if ($_FILES['foto']['name']){
			// kalau ada file yang  di upload
			// ambil isi file yang di aplot
			$gmbr = file_get_contents($_FILES['foto']['tmp_name']);
			//bersihkan isi file
			$gmbr = mysqli_real_escape_string($koneksi,$gmbr);
		}else {
			$gmbr = null;
		}

		$res = mysqli_query($koneksi,"insert into pegawai values ('$id','$nama','$gmbr','$shift','$pass')");
		if($res){ //berhasil
			echo "tambah pegawai berhasil<br>";
			header('location:pegawai.php');
		}
		else{ //gagal
			echo "tambah pegawai gagal<br>";
			mysqli_error($koneksi);
			header('location:pegawai.php');
		}
	} else {
		header('location:pegawai.php');
	}
	mysqli_close($koneksi);
	// header('location:viewproduk.php');
?>
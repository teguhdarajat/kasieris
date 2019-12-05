
<?php
	if (isset($_POST['id-admin'])){
		include 'koneksi.php';
		$id = $_POST['id-admin'];
		$nama = $_POST['nama-admin'];
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

		$res = mysqli_query($koneksi,"insert into admin values ('$id','$nama','$gmbr','$pass')");
		if($res){ //berhasil
			echo "tambah admin berhasil<br>";
			header('location:admin.php');
		}
		else{ //gagal
			echo "tambah admin gagal<br>";
			mysqli_error($koneksi);
			header('location:admin.php');
		}
	} else {
		header('location:admin.php');
	}
	mysqli_close($koneksi);
	// header('location:viewproduk.php');
?>
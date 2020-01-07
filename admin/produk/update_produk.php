<?php include $_SERVER['DOCUMENT_ROOT']."/admin/cek_login.php" ?>

<?php
 if (isset($_GET['id'])){
		//load form update
        include 'koneksi.php';
        include $_SERVER['DOCUMENT_ROOT'].'/admin/phpqrcode/qrlib.php';
		$id = $_GET['id'];
		if (isset($_POST['id-produk'])){
		$id_p = $_POST['id-produk'];
		$nama = $_POST['nama-produk'];
		$harga = $_POST['harga-produk'];
		$stok = $_POST['stok-produk'];
        $supplier = $_POST['supplier-produk'];
        if($id != $id_p){
            $filename = "qrcode/".$id.".png";
            unlink($filename);
            QRcode::png($id_p, "qrcode/".$id_p.".png", "L", 4, 4);
        }
			$yu = mysqli_query($koneksi,"update barang set idbarang='$id_p',nama_barang='$nama',harga='$harga',stok='$stok' where idbarang = '$id'");
			if($yu){ //berhasil
				echo "Update barang berhasil<br>";
				header('location:/admin/produk/produk.php');
			}
			else{ //gagal
				echo "Update barang gagal<br>";
				header('location:/admin/produk/produk.php');	
			}
			//submit perubahan
		}else{
			$res = mysqli_query($koneksi,"select * from barang where idbarang = '$id' ");
		if($data = mysqli_fetch_array($res)){ 
			//data ada

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/script.js"></script>
    <title>Beranda</title>
    <style>
        .foto-profil {
            background: url(<?php echo 'data:image/jpg;base64,'.$_SESSION['foto'] ?>);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            background-size: cover;
            float: left;
            display: inline-block;
            width: 2.3rem;
            height: 2.3rem;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>    
</head>
<body>
<!-- Awal Bagian Header -->
    <header>
        <h2 class="logo">Logo</h2>
        <div class="user-menu">
            <a href="#" onclick="dropDownMenu()" class="tombol-dropdown">
                <span class="foto-profil"></span>
                <span>
                    <span class="user-name">Ujang Sigarantang</span><br>
                    <small>Administrator</small>
                </span>
            </a>
            <div id="dropdown-user" class="dropdown-user">                          
                <a href="/admin/logout.php">Logout</a>
            </div>
        </div>
    </header>
<!-- Akhir Bagian Header -->


<!-- Awal Bagian Navigasi -->
    <nav>
        <ul>
            <li>
                <a href="/admin/index.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="produk.php" class="aktif">
                    <i class="icon-box"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="/admin/supplier/supplier.php">
                    <i class="icon-box-1"></i>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="/admin/pegawai/pegawai.php">
                    <i class="icon-users"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <li>
                <a href="/admin/admin/admin.php">
                    <i class="icon-user"></i>
                    <span>Administrator</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-doc-text-inv"></i>
                    <span>Laporan</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Akhir Bagian Navigasi -->


    <!-- Awal Bagian Isi -->
    <div class="induk">
        <span class="judul-page">Produk</span>
        <div class="konten-form">
            <h4>Edit Data Produk</h4>
            <form method="post">
                <label for="id-produk">ID Produk : </label><br>
                <input type="text" name="id-produk" placeholder="Input ID Produk" class="form-input" value="<?= $data['idbarang'] ?>">

                <label for="id-produk">Nama Produk : </label><br>
                <input type="text" name="produk_nama" placeholder="Input Nama Produk" class="form-input" value="<?= $data['nama_barang'] ?>">

                <label for="id-produk">Supplier Produk : </label><br>
                <select name="supplier-produk" id="">
                <?php                    
                    $get_data_supplier = mysqli_query($koneksi, "SELECT * FROM supplier;");
                    foreach($get_data_supplier as $data1){                                        
                ?>                    
                    <option name="supplier-produk" value="<?= $data1['idsupplier'] ?>"><?= $data1['nama_supplier']  ?></option>
                    <?php } ?>
                </select>

                <label for="id-produk">Harga Produk : </label><br>
                <input type="text" name="harga-produk" placeholder="Input Harga Produk" class="form-input" value="<?= $data['harga'] ?>">

                <label for="id-produk">Stok : </label><br>
                <input type="text" name="stok" placeholder="Input Stok Produk" class="form-input" value="<?= $data['stok'] ?>">

                <br><br>
                <button class="tombol-primer btn-submit">Submit</button>
                <input type="submit" value="Kembali" onclick="location.href='/admin/produk/produk.php'" class="tombol-primer btn-kembali">
            </form>
        </div>
    </div>
<!-- Akhir Bagian Isi -->

<!-- Awal bagian footer -->
<footer>
   <span>Copyright GakTubesGakWisuda</span>
</footer>
</body>
</html>

<?php

		}else{ //gagal
			echo "Update barang gagal<br>";
				// header('location:produk.php');	
		}
	}
	} else {
        echo "asdasd";
		// header('location:produk.php');
	}
?>
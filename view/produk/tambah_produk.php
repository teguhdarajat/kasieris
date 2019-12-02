<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <title>Beranda</title>
</head>
<body>
<!-- Awal Bagian Header -->
    <header>
        <h2 class="logo">Logo</h2>
        <div class="user-menu">
            <a href="">
                <span class="foto-profil"></span>
                <span>
                    <span class="user-name">Ujang Sigarantang</span><br>
                    <small>Administrator</small>
                </span>
            </a>
        </div>
    </header>
<!-- Akhir Bagian Header -->


<!-- Awal Bagian Navigasi -->
    <nav>
        <ul>
            <li>
                <a href="/index.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-basket"></i>
                    <span>Kasir</span>
                </a>
            </li>
            <li>
                <a href="produk.php" class="aktif">
                    <i class="icon-box"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-box-1"></i>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-users"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-user"></i>
                    <span>Member</span>
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
            <h4>Tambah Data Produk</h4>
            <form action="/controller/controller_produk.php" method="post">
                <label for="id-produk">ID Produk : </label><br>
                <input type="text" name="id-produk" id="" placeholder="Input ID Produk" class="form-input">
                <label for="id-produk">Nama Produk : </label><br>
                <input type="text" name="nama-produk" id="" placeholder="Input Nama Produk" class="form-input">
                <label for="id-produk">Supplier Produk : </label><br>
                <select name="supplier-produk" id="">
                    <option value="">--Pilih---</option>
                    <option value="Asus Indonesia">Asus Indonesia</option>
                    <option value="Asus Indonesia">Asus Antartika</option>
                    <option value="Asus Indonesia">Asus Zimbabwe</option>
                </select>
                <label for="id-produk">Harga Produk : </label><br>
                <input type="number" name="harga-produk" id="" placeholder="Input Nama Produk" class="form-input">                
                <label for="id-produk">Stok : </label><br>
                <input type="number" name="stok-produk" id="" placeholder="Input Nama Produk" class="form-input">                
                <br>
                <br>
                <button class="tombol-primer btn-submit" name="produk">Submit</button>
                <input type="submit" value="Kembali" onclick="location.href='produk.php'" class="tombol-primer btn-kembali">
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

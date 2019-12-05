<?php include $_SERVER['DOCUMENT_ROOT']."/admin/cek_login.php" ?>

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
                <span class='user-name'><?php echo $_SESSION['login'] ?></span><br>
                    <small>Administrator</small>
                </span>
            </a>
            <div id="dropdown-user" class="dropdown-user">
                <a href="#home">Profil</a>                
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
            <a href="/admin/produk/produk.php">
                <i class="icon-box"></i>
                <span>Produk</span>
            </a>
        </li>
        <li>
            <a href="/admin/supplier/supplier.php" class="aktif">
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
                <span>Admin</span>
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
            <h4>Tambah Data Supplier</h4>
            <form action="input_supplier.php" method="post">
                <label for="id-produk">ID Supplier : </label><br>
                <input type="text" name="id-supplier" id="" placeholder="Input ID Produk" class="form-input">

                <label for="id-produk">Nama Supplier : </label><br>
                <input type="text" name="nama-supplier" id="" placeholder="Input Nama Produk" class="form-input">

                <label for="id-produk">Alamat Supplier : </label><br>
                <input type="text" name="alamat-supplier" id="" placeholder="Input Nama Produk" class="form-input">


                <label for="id-produk">Nomor Telepon Supplier : </label><br>
                <input type="text" name="nomor-supplier" id="" placeholder="Input Harga Produk" class="form-input">

                <label for="id-produk">Email : </label><br>
                <input type="text" name="email-supplier" id="" placeholder="Input Stok Produk" class="form-input">

                <br><br>
                <button class="tombol-primer btn-submit">Submit</button>
                <input type="submit" value="Kembali" onclick="location.href='supplier.php'" class="tombol-primer btn-kembali">
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

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
                <a href="/logout.php">Logout</a>
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
                <a href="/admin/supplier/supplier.php">
                    <i class="icon-box-1"></i>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="pegawai.php">
                    <i class="icon-users"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <li>
                <a href="/admin/administrator/admin.php">
                    <i class="icon-user"></i>
                    <span>Admin</span>
                </a>
            </li>
            <li>
                <a href="#" class="aktif">
                    <i class="icon-doc-text-inv"></i>
                    <span>Laporan</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Akhir Bagian Navigasi -->


    <!-- Awal Bagian Isi -->
    <div class="induk">
        <span class="judul-page">Data Transaksi</span>
        <div class="konten">
            <h4>Daftar Data Transaksi</h4>
            <table class="tabel">
                <tr>
                    <th>ID Transaksi</th>                
                    <th>Barang yang dibeli</th>
                    <th>Kasir yang Melayani</th> 
                    <th>ID Pembeli</th>                                       
                    <th>Total</th>                                       
                    <th>Waktu Pembelian</th>                    
                </tr>
                <?php
                    include 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM pembelian");
                    foreach($query as $data){
                ?>
                <tr>                    
                    <td><?php echo $data['id_pembelian'] ?></td>
                    <td><?php echo $data['id_barang']?></td>                    
                    <td><?php echo $data['id_kasir']?></td>
                    <td><?php echo $data['id_pembeli']?></td>
                    <td><?php echo $data['total']?></td>
                    <td><?php echo $data['tgl_pembelian']?></td>
                </tr>
                    <?php }?>
            </table>
            <br>
            <br>                                   
        </div>
    </div>
<!-- Akhir Bagian Isi -->

<!-- Awal bagian footer -->
<footer>
   <span>Copyright GakTubesGakWisuda</span>
   
</footer>
</body>
</html>

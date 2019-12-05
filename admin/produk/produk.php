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
                <a href="/admin/produk.php" class="aktif">
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
        <div class="konten">
            <h4>Data Produk</h4>
            <table class="tabel">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Supplier</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th></th>                    
                </tr>
                <?php
                    include 'koneksi.php';
                    $query = mysqli_query($koneksi, "SELECT * FROM barang");
                    foreach($query as $data){
                ?>
                <tr>                    
                    <td><?php echo $data['idbarang'] ?></td>
                    <td><?php echo $data['nama_barang']?></td>
                    <td>Supplier</td>
                    <td><?php echo $data['supplier']?></td>
                    <td><?php echo $data['stok']?></td>
                    <td>
                        <div class="dropdown">
                            <button class="tombol-primer tombol-tabel">Aksi &#x25BE;</button>
                            <div class="dropdown-aksi">
                                <a href="/admin/produk/lihat_produk.php?id=<?= $data['idbarang'] ?>">Lihat</a>
                                <a href="/admin/produk/update_produk.php?id=<?= $data['idbarang'] ?>">Ubah</a>
                                <a href="/admin/produk/hapus_produk.php?id=<?= $data['idbarang'] ?>">Hapus</a>
                            </div>                            
                        </div>
                    </td>
                </tr>
                    <?php }?>
            </table>
            <br>
            <br>                       
            <input type="submit" value="Tambah Produk" onclick="location.href='/admin/produk/tambah_produk.php'" class="tombol-primer">
        </div>
    </div>
<!-- Akhir Bagian Isi -->

<!-- Awal bagian footer -->
<footer>
   <span>Copyright GakTubesGakWisuda</span>
   
</footer>
</body>
</html>

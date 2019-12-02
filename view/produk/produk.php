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
                <a href="/view/kasir/kasir.php">
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
        <div class="konten">
            <h4>Data Produk</h4>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Supplier</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th></th>                    
                </tr>
                <?php
                    for($i = 1; $i <= 10; ++$i){
                ?>
                <tr>
                    <?php $itb = str_pad($i, 7, '0', STR_PAD_LEFT); ?>
                    <td><?php echo "PRO-".$itb; ?></td>
                    <td>Asus ROG GT7839</td>
                    <td>Asus Indonesia</td>
                    <td>5,000,000</td>
                    <td>90</td>
                    <td>
                        <div class="dropdown">
                            <button class="tombol-primer tombol-tabel">Aksi &#x25BE;</button>
                            <div class="dropdown-aksi">
                                <a href="#">Lihat</a>
                                <a href="#">Ubah</a>
                                <a href="#">Hapus</a>
                            </div>                            
                        </div>
                    </td>
                </tr>
                    <?php }?>
            </table>
            <br>
            <br>                       
            <input type="submit" value="Tambah Produk" onclick="location.href='tambah_produk.php'" class="tombol-primer">
        </div>
    </div>
<!-- Akhir Bagian Isi -->

<!-- Awal bagian footer -->
<footer>
   <span>Copyright GakTubesGakWisuda</span>
   
</footer>
</body>
</html>

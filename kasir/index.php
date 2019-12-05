<?php
    include $_SERVER['DOCUMENT_ROOT']."/kasir/cek_login.php"; 
    include "koneksi.php"; 
    date_default_timezone_set('Asia/Jakarta'); 
    if(date('H') >= 5 && date('H') < 10){
        $waktu = "Pagi";
    }
    else if(date('H') >= 10 && date('H') < 15){
        $waktu = "Siang";
    }
    else if(date('H') >= 15 && date('H') < 18){
        $waktu = "Sore";
    }
    else if((date('H') >= 18 && date('H')) <= 23 || (date('H') >= 0 && date('H') < 4)){
        $waktu = "Malam";
    }
    $transaksi = 0;
    $pendapatan = 0;
    $id_kasir = $_SESSION['login_kasir'];
    $query_pendapatan = mysqli_query($koneksi, "SELECT total FROM pembelian WHERE MONTH(tgl_pembelian) = MONTH(CURRENT_DATE()) && id_kasir = '$id_kasir'");
    foreach($query_pendapatan as $data){
        $pendapatan += $data['total'];
        $transaksi++;
    }

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
        <img src="/logo.png" width="120" style="margin-left: 90px">
        <div class="user-menu" style="margin-top: 10px;">
            <a href="#" onclick="dropDownMenu()" class="tombol-dropdown">
                <span class="foto-profil"></span>
                <span>
                    <span class='user-name'><?php echo $_SESSION['nama_kasir'] ?></span><br> 
                    <small>Kasir</small>
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
                <a href="/kasir/index.php" class="aktif">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="/kasir/kasir.php">
                    <i class="icon-basket"></i>
                    <span>Kasir</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Akhir Bagian Navigasi -->


    <!-- Awal Bagian Isi -->
    <div class="induk">
        <span class="judul-page">Beranda</span>
        <div class="konten" style="background: #9cf196; overflow: visible; height: 170px">
            <img src="/hello.svg" style="float: right; position: relative; top: -90px; right: 40px" width="330px">
            <h1 style="margin-top: 20px;font-size: 28pt;color: #0A9930; position: relative; left: 25px;">Selamat <?php echo $waktu.", ".strstr($_SESSION['nama_kasir'], ' ', true); ?>!</h1>
            <br>
            <p style="font-size: 13pt; margin-left: 25px">Selamat datang kembali! <br style="margin-bottom: 3px;">Semoga hari ini seluruh targetmu tercapai</p>        
        </div>

        <div class="container">
            <div class="konten-ml">
                <h1 style="color: #0A9930;">Rp. <?php echo number_format($pendapatan,2); ?></h1>
                <br>
                <h3>Pendapatan Bulan Ini</h3>
            </div>
            <div class="konten-ml">
                <h1 style="color: #0A9930;"><?= $transaksi ?></h1>
                <br>
                <h3>Transaksi Bulan Ini</h3>
            </div>
            <div class="konten-ml" style="margin-top: -25px; margin-right: 0">
                <h1 style="color: #0A9930;">150</h1>
                <br>
                <h3>Barang Terjual Bulan Ini</h3>
            </div>
        </div>
    </div>
<!-- Akhir Bagian Isi -->

<!-- Awal bagian footer -->
<footer>
   <span>Copyright GakTubesGakWisuda</span>
   
</footer>
</body>
</html>

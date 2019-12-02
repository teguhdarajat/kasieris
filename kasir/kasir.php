 <?php include $_SERVER['DOCUMENT_ROOT']."/cek_login.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" idBarang="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" idBarang="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/home.css">    
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
                <a href="/index.php">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="aktif">
                    <i class="icon-basket"></i>
                    <span>Kasir</span>
                </a>
            </li>
            <li>
                <a href="/produk/produk.php">
                    <i class="icon-box"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="/supplier/supplier.php">
                    <i class="icon-box-1"></i>
                    <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="/pegawai/pegawai.php">
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
        <span class="judul-page">Kasir</span>
        <div class="konten-induk">
            <div class="konten-m">
                <h4>Data Produk</h4>
                <p id="tes"></p>
                <table class="tabel" id="kasir">
                    <tr>
                        <th>Nama Produk</th>                    
                        <th>Harga</th>
                        <th>Qty.</th>
                        <th>Diskon</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>                    
                    </tr>
                </table>
                <br>
                <br>                       
                <input type="submit" value="Tambah Produk" onclick="location.href='tambah_produk.php'" class="tombol-primer">
            </div>

            <div class="konten-s">
                <input type="search" name="" class="form-input" id="cari">
                <button style="float: right;" class="tombol-primer tombol-tabel" id="getUser">Cari</button>
                <div class="kamera">
                    <video id="preview" width="270" height="270"></video>
                    <input type="hidden" name="qr" :key="scan.date" :value="scan.content" />
                </div>
                <table style="width: 100%; margin-top: 20px;" id="hitung">
                    <tr style="padding-bottom: 30px;">
                        <td style="text-align: left; font-size: 14pt;">Total: </td>
                        <td style="text-align: right; font-size: 14pt;">Rp. <span id="bayar-subtotal">0</span></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; font-size: 14pt;">Pembayaran: </td>
                        <td style="text-align: right; font-size: 14pt;"><input type="number" name="bayar" id="pembayaran"></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; font-size: 14pt;">Kembalian: </td>
                        <td style="text-align: right; font-size: 14pt;" style="">Rp. <span id="bayar-total">0</span></td>
                    </tr>
                </table>
                <form action="data.php" method="post" class="sembunyi">
                                                          
                </form>
            </div>
        </div>
    </div>
<!-- Akhir Bagian Isi -->

<!-- Awal bagian footer -->
<footer>
   <span>Copyright GakTubesGakWisuda</span>
   
</footer>
<script src="/instascan.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function(idBarang) {
        audio = new Audio('/audio.mp3');
        audio.play();
        let id = idBarang;
        let i = 0;
        console.log(id)

        $.ajax({
            url: "get_data.php",
            method: "post",
            data: "id="+id,
            success: function(data){
                $("#kasir").append(data);
                
            }

        })
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
</body>
</html>

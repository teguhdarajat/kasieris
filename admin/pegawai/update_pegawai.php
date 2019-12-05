<?php include $_SERVER['DOCUMENT_ROOT']."/admin/cek_login.php" ?>

<?php
 if (isset($_GET['id'])){
        //load form update
        include 'koneksi.php';
        $id = $_GET['id'];
        if (isset($_POST['id-pegawai'])){
        $id_p = $_POST['id-pegawai'];
        $nama = $_POST['nama-pegawai'];
        $shift = $_POST['shift-kerja'];
        $pass = $_POST['password'];
        if ($_FILES['foto']['name']){
            // kalau ada file yang  di upload
            // ambil isi file yang di aplot
            $gmbr = file_get_contents($_FILES['foto']['tmp_name']);
            //bersihkan isi file
            $gmbr = mysqli_real_escape_string($koneksi,$gmbr);
            $yu = mysqli_query($koneksi,"update kasir set id_kasir='$id_p',nama_kasir='$nama',image='$gmbr',shift_kerja='$shift',password='$pass' where id_kasir = '$id'") or die(mysqli_error($koneksi));
        }else {        
            $yu = mysqli_query($koneksi,"update kasir set id_kasir='$id_p',nama_kasir='$nama',shift_kerja='$shift',password='$pass' where id_kasir = '$id'");
        }


            
            if($yu){ //berhasil
                echo "Update pegawai berhasil<br>";
                header('location:pegawai.php');
            }
            else{ //gagal
                // echo mysqli_errno();
                // header('location:pegawai.php');  
            }
            //submit perubahan
        }else{
            $res = mysqli_query($koneksi,"select * from kasir where id_kasir = '$id' ");
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
                <a href="pegawai.php" class="aktif">
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
        <span class="judul-page">Pegawai</span>
        <div class="konten-form">
            <h4>Tambah Data Pegawai</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <label>ID Pegawai : </label><br>
                <input type="text" name="id-pegawai" id="" placeholder="Input ID Pegawai" class="form-input" value="<?= $data['id_kasir'] ?>">

                <label>Nama Pegawai : </label><br>
                <input type="text" name="nama-pegawai" id="" placeholder="Input Nama Pegawai" class="form-input" value="<?= $data['nama_kasir'] ?>">

                <label>Foto Pegawai : </label><br>
                <?php echo "<input type='file' name='foto' id=''  class='form-input' value='data:image/jpg;base64,".base64_encode($data['image'])."'>"?>


                <label>Shift Kerja : </label><br>
                <select name="shift-kerja">
                    <option value="Pagi">Pagi</option>
                    <option value="Sore">Sore</option>
                </select>

                <label>Password : </label><br>
                <input type="password" name="password" placeholder="" class="form-input" value="<?= $data['password'] ?>">

                <br><br>
                <button class="tombol-primer btn-submit">Submit</button>
                <input type="submit" value="Kembali" onclick="location.href='pegawai.php'" class="tombol-primer btn-kembali">
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

        }
        else { //gagal
            echo "Update pegawai gagal<br>";
                header('location:pegawai.php');  
        }
    }
    } else {
        header('location:pegawai.php');
    }
?>
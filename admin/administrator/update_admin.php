<?php include $_SERVER['DOCUMENT_ROOT']."/admin/cek_login.php" ?>


<?php
 if (isset($_GET['id'])){
        //load form update
        include 'koneksi.php';
        $id = $_GET['id'];
        if (isset($_POST['id-admin'])){
        $id_p = $_POST['id-admin'];
        $nama = $_POST['nama-admin'];
        $shift = $_POST['shift-kerja'];
        $pass = $_POST['password'];
        if ($_FILES['foto']['name']){
            // kalau ada file yang  di upload
            // ambil isi file yang di aplot
            $gmbr = file_get_contents($_FILES['foto']['tmp_name']);
            //bersihkan isi file
            $gmbr = mysqli_real_escape_string($koneksi,$gmbr);
            $yu = mysqli_query($koneksi,"update admin set id_admin='$id_p',nama_admin='$nama',foto='$gmbr',password='$pass' where id_admin = '$id'");
        }else {        
            $yu = mysqli_query($koneksi,"update admin set id_admin='$id_p',nama_admin='$nama',password='$pass' where id_admin = '$id'");
        }


            
            if($yu){ //berhasil
                echo "Update admin berhasil<br>";
                header('location:admin.php');
            }
            else{ //gagal
                echo "Update admin gagal<br>";
                // header('location:admin.php');  
            }
            //submit perubahan
        }else{
            $res = mysqli_query($koneksi,"select * from admin where id_admin = '$id' ");
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
                <a href="/admin/administrator/admin.php" class="aktif">
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
        <span class="judul-page">admin</span>
        <div class="konten-form">
            <h4>Tambah Data admin</h4>
            <form action="" method="post" enctype="multipart/form-data">
                <label>ID admin : </label><br>
                <input type="text" name="id-admin" id="" placeholder="Input ID admin" class="form-input" value="<?= $data['id_admin'] ?>">

                <label>Nama admin : </label><br>
                <input type="text" name="nama-admin" id="" placeholder="Input Nama admin" class="form-input" value="<?= $data['nama_admin'] ?>">

                <label>Foto admin : </label><br>
                <?php echo "<input type='file' name='foto' id=''  class='form-input' value='data:image/jpg;base64,".base64_encode($data['foto'])."'>"?>


                <label>Shift Kerja : </label><br>

                <label>Password : </label><br>
                <input type="password" name="password" placeholder="" class="form-input" value="<?= $data['password'] ?>">

                <br><br>
                <button class="tombol-primer btn-submit">Submit</button>
                <input type="submit" value="Kembali" onclick="location.href='admin.php'" class="tombol-primer btn-kembali">
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
            echo "Update admin gagal<br>";
                header('location:admin.php');  
        }
    }
    } else {
        header('location:admin.php');
    }
?>
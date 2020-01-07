<?php
    include 'koneksi.php';
    session_start();

    function idGenerator($id, $panjang_kode, $panjang_angka){
        $kode = substr($id, 0, $panjang_kode);
        $angka = substr($id, $panjang_kode, $panjang_angka);
        $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
        $generate_id = $kode.$angka_baru;
        return $generate_id;
    }

    if(isset($_POST['tombol-bayar'])){
        $idbarang = implode(",", $_POST['idbarang']);
        $idkasir = $_SESSION['login_kasir'];
        $query_last_id_pembelian = mysqli_query($koneksi, "SELECT  MAX(id) from pembelian");
        $query_last_id_pembeli = mysqli_query($koneksi, "SELECT  MAX(id) from pembeli");
        foreach($query_last_id_pembelian as $a){
            $lastIDPelanggan = (int)$a['MAX(id)'];
        }
        foreach($query_last_id_pembeli as $b){
            $lastIDPembelian = (int)$b['MAX(id)'];
        }
        $id_pelanggan_lama = "PELANGGAN-".str_pad($lastIDPelanggan, 7, '0', STR_PAD_LEFT);
        $id_pembelian_lama = "PEMBELIAN-".str_pad($lastIDPembelian, 7, '0', STR_PAD_LEFT);
        $id_pelanggan_baru = idGenerator($id_pelanggan_lama, 10, 7);
        $id_pembelian_baru = idGenerator($id_pembelian_lama, 10, 7);
        $total = (int)$_POST['form-subtotal'];
        $jumlah_pembelian = $_POST['kuantitas'];        
        $query_pembeli = mysqli_query($koneksi, "INSERT INTO pembeli (idpembeli, tgl_kunjungan) VALUES('$id_pelanggan_baru', now())");                        
        if($query_pembeli){
            $query = mysqli_query($koneksi, "INSERT INTO pembelian (id_pembelian, id_barang, id_kasir, id_pembeli, total, tgl_pembelian) 
            VALUES('$id_pembelian_baru', '$idbarang','$idkasir', '$id_pelanggan_baru', '$total', now())");                
            if($query){
                header('location: /kasir/kasir.php');
            }   
            else{
                echo mysqli_error($koneksi)." asdas";
            }             
        }
        else{
            echo mysqli_error($koneksi)." asdsad";
        }
    }
?>

<!-- 

 -->

 <!-- CREATE TRIGGER test BEFORE INSERT ON pembelian -->

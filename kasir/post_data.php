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
        $idbarang = implode(", ", $_POST['idbarang']);
        $idkasir = $_SESSION['login_kasir'];
        $query_last_id_pembelian = mysqli_query($koneksi, "SELECT  MAX(id) from pembelian");
        $query_last_id_pembeli = mysqli_query($koneksi, "SELECT  MAX(id) from pembeli");
        foreach($query_last_id_pembelian as $a){
            $lastIDPelanggan = $a['MAX(id)'];
        }
        foreach($query_last_id_pembeli as $b){
            $lastIDPembelian = $b['MAX(id)'];
        }
        $id_pelanggan_lama = "PELANGGAN-000000000".$lastIDPelanggan;
        $id_pembelian_lama = "PEMBELIAN-000000000".$lastIDPembelian;
        $id_pelanggan_baru = idGenerator($id_pelanggan_lama, 10, 10);
        $id_pembelian_baru = idGenerator($id_pembelian_lama, 10, 10);

        $test = mysqli_query($koneksi, 'SET @id_pembeli ="'.$id_pelanggan_baru.'"');    
        $total = (int)$_POST['form-subtotal'];
        $jumlah_pembelian = $_POST['kuantitas'];
        if ($test){
            $query_pembeli = mysqli_query($koneksi, "INSERT INTO pembeli (idpembeli, tgl_kunjungan) VALUES('$id_pelanggan_baru', now())");                        
            if($query_pembeli){
                $query = mysqli_query($koneksi, "INSERT INTO pembelian (id_pembelian, id_barang, id_kasir, id_pembeli, total, tgl_pembelian) 
                VALUES('$id_pembelian_baru', '$idbarang','$idkasir', '$id_pelanggan_baru', '$total', now())");                
                if($query){
                    header('location: /kasir/index.php');
                }   
                else{
                    echo "asdasd";
                }             
            }
            else{
                echo mysqli_error($koneksi);
            }
        }
        else {
            echo "askhdahsd";
        }
    }
?>

<!-- 

 -->

 <!-- CREATE TRIGGER test BEFORE INSERT ON pembelian -->

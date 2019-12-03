<?php
    if(ISSET($_POST['id'])){
        include 'koneksi.php';
        $id = $_POST['id'];
        
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE idbarang = '$id'");

        if(mysqli_num_rows($query) > 0){
            foreach($query as $a){ ?>
                <tr id='list-belanja'>
                    <td><?= $a['nama_barang'] ?></td>
                    <td id="harga"><?= $a['harga'] ?></td>
                    <td><input type='number' class="inputan" id='qty' value='1' name="kuantitas[]"></td>
                    <td><input type='number' class="inputan" id='diskon' value='0' name="harga[]"></td>
                    <td class="subtotal" id="sub-total"><?= $a['harga'] ?></td>                                                    
                    <td><input type="button" name="hapus" value="Hapus" class="hapus"></td>
                    <input type="hidden" value="<?= $a['idbarang'] ?>" class="idbarang" name="idbarang[]">
                </tr>;                

                <script>                                 
                    var $kasir = $('#kasir').first().clone();
                    var $hitung = $('#hitung').first().clone();
                    var total = 0
                    var subTotal = 0  
                    $('#kasir input').on('input', function() {
                        var $tr = $(this).closest('tr');                                               
                        var qty = 0
                        var diskon = 0
                        var harga = Number($('#harga', $tr).text())

                        $('#qty', $tr).each(function() { 
                            qty += Number($(this).val()) || 0;                             
                        });

                        $('#diskon', $tr).each(function() { 
                            diskon += Number($(this).val()) || 0; 
                        });     

                        subTotal = (harga - (harga * (diskon / 100))) * qty   

                        $('#sub-total', $tr).text(subTotal);
                        hitungTotal()                        
                    }).trigger('input');

                    $("#kasir").on('click', 'input.hapus', function () {
                        var $tr = $(this).closest('#list-belanja');
                        var $tr2 = $(this).closest('tr');                        
                        var cek = Number($('#sub-total', $tr2).text())  
                        var bayarSubTotal = Number($('#bayar-subtotal').text)      
                        subtotal = bayarSubTotal - cek                
                        console.log("Cek = " + cek)   
                        console.log("bayar-sub-total" + bayarSubTotal)                  
                        $('#sub-total', $tr2).text(subTotal);
                        $tr.remove();
                    });                     

                    function hitungTotal(){
                        var total = 0
                        var pembayaran = 0
                        $('.subtotal').each(function() {
                            total += Number($(this).text())                            
                        })
                        var pembayaran = 0                        
                        $("#pembayaran").keyup(function () {   
                            var bayar= Number($(this).val())   
                            pembayaran = bayar - total
                            $("#bayar-total").text(pembayaran);                              
                        });                                                                   
                        $('#bayar-subtotal').text(total)    
                                           
                        // console.log(total)                                            
                    }                    
                </script>
            <?php }
        }
        else {
            echo "<p>gagal</p>";
        }
    }
    else {
        echo "<p>Gagal2</p>";
    }
?>


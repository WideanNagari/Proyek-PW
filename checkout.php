<?php
    require_once("connection.php");

    $idprov = $user_login["provinsi"];
    $mybag = [];
    if(isset($_COOKIE["mybag"])){
        $mybag = json_decode($_COOKIE["mybag"],true);
    }else{
        header("location: index.php");
    }
    $error = -1;
    if(isset($_POST["checkout2"])){
        if($user_login["saldo"]>=$_POST['checkout2']){
            $mybag = json_decode($_COOKIE["mybag"],true);
            $kirim = mysqli_query($conn, "SELECT * FROM provinsi p, harga_pengiriman h WHERE p.id_provinsi = '$idprov' AND p.id_harga=h.id_harga");
            $waktu = 0;
            while($row = mysqli_fetch_array($kirim)){
                $waktu = $row["waktu_pengiriman"];
            }
            foreach($mybag as $key => $barang){
                mysqli_query($conn, "UPDATE barang SET stok = stok-$barang[jumlah] WHERE id_barang='$barang[id]'");
                $idTransaksi = "TR";
                $result = mysqli_query($conn, "select * from transaksi");
                $jumlah = mysqli_num_rows($result);
                $jumlah+=1;
                if($jumlah<10){
                    $idTransaksi = $idTransaksi . "00" . $jumlah;
                }else if($jumlah<100){
                    $idTransaksi = $idTransaksi . "0" . $jumlah;
                }else{
                    $idTransaksi = $idTransaksi . $jumlah;
                }
                $idKirim = "KI";
                $result = mysqli_query($conn, "select * from pengiriman");
                $jumlah = mysqli_num_rows($result);
                $jumlah+=1;
                if($jumlah<10){
                    $idKirim = $idKirim . "00" . $jumlah;
                }else if($jumlah<100){
                    $idKirim = $idKirim . "0" . $jumlah;
                }else{
                    $idKirim = $idKirim . $jumlah;
                }
                $timeStamp = date('d F Y ');
                $timeStamp = $timeStamp . "at" . date(' H:i', time());

                $timeStamp2 = date('d F Y ');
                $timeStamp2= $timeStamp2 . "at" . date(' H:i', time() + $waktu);

                $diskon = 0;
                //sementara diskon 0 dulu
                $totalHarga = (($barang['harga'] * $barang['jumlah']) - $diskon) + $_POST['ongkir'];
                $times = time()+$waktu;
                mysqli_query($conn, "insert into transaksi values('$idTransaksi','$user_login[id]','$barang[nama]','$barang[jumlah]', '$barang[harga]','$diskon','$_POST[ongkir]','$totalHarga', '-')");
                mysqli_query($conn, "insert into pengiriman values('$idKirim','$idTransaksi','$timeStamp','$timeStamp2', '$times','onGoing')");
            }
            setcookie("mybag","",time()-1);
            $user_login["saldo"] -= $_POST['checkout2'];
            $_SESSION["user"] = $user_login;
            setcookie("userLog",json_encode($user_login),time()+60*60);  
            mysqli_query($conn, "UPDATE customer SET saldo = $user_login[saldo] WHERE id_customer='$user_login[id]'");
            header("location: pengiriman.php?success=1");
        }else{
            $error = 1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/checkout.css">
    <script>
        function pilihanKurir(){
            var mybag = <?= json_encode($mybag) ?>;
            var harga = document.getElementById("kurirs").value;
            var idx = document.getElementById("kurirs").selectedIndex;
            var nama = document.getElementById("kurirs").getElementsByTagName('option')[idx].innerText;
            document.getElementById("ongkos").innerText="Ongkos Kirim: Rp. "+harga;
            document.getElementById("jumBarang").innerText="Jumlah Jenis Barang: "+mybag.length;
            document.getElementById("TotOngkos").innerText="Subtotal Ongkos Kirim: Rp. "+(harga * mybag.length)+" ("+nama+")";
            var totHarga = (harga * mybag.length);
            var totHarga2 = 0;
            while (document.getElementById("collection").firstChild) {
                document.getElementById("collection").removeChild(document.getElementById("collection").firstChild);
            }
            
            $('.barang_apa_aja').append(`Barang yang anda pesan:`);
            for(let i = 0; i<mybag.length; i++){
                var jumlah = mybag[i]["jumlah"];
                var harga2 = mybag[i]["harga"]*jumlah;
                totHarga= Number(totHarga)+Number(harga2);
                totHarga2= Number(totHarga2)+Number(harga2);
                var nama = mybag[i]["nama"];
                var nomor = i+1;
                $('.barang_apa_aja').append(`
                    <div style="padding-top: 10px;">${nomor}. ${nama} (x${jumlah}) = Rp. ${harga2}</div>
                `);
            }

            var diskon = JSON.parse(document.getElementById("event").value);
            var dis = Number(diskon[0])+(diskon[1] * totHarga2/100);
            totHarga = totHarga-dis;
            document.getElementById("tombol").setAttribute('value',totHarga);
            document.getElementById("harga").innerText="Total Harga: Rp. "+totHarga;
        }
        function pilihanEvent(){
            if(document.getElementById("event").value!=""){
                var mybag = <?= json_encode($mybag) ?>;
                var diskon = JSON.parse(document.getElementById("event").value);
                var harga = document.getElementById("kurirs").value;
                var totHarga1 = (harga * mybag.length);
                var totHarga = 0;
                for(let i = 0; i<mybag.length; i++){
                    var jumlah = mybag[i]["jumlah"];
                    var harga2 = mybag[i]["harga"]*jumlah;
                    totHarga = Number(totHarga)+Number(harga2);
                }

                var dis1 = diskon[0];
                var dis2 = diskon[1] * totHarga/100;
                var dis = Number(dis1)+Number(dis2);
                document.getElementById("diskon2").innerText="Diskon (0%): Rp. "+dis2;
                document.getElementById("diskon1").innerText="Tambahan Diskon: "+dis1;
                document.getElementById("TotDiskon").innerText="Subtotal Diskon: Rp. "+dis;
                totHarga = Number(totHarga)-Number(dis)+totHarga1;
                
                document.getElementById("tombol").setAttribute('value',totHarga);
                document.getElementById("harga").innerText="Total Harga: Rp. "+totHarga;
            }
        }
        function r(){
            alert("a");
        }
    </script>
</head>
<body>
    <div class="header">
        <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <ul>
            <li>Clothes</li>
            <li>Trousers</li>
            <li>Jacket</li>
            <li>Bag</li>
            <li>Shoes</li>
            <li>
                <form action="mybag.php" method="POST"><button type="submit" id="back">Back</button></form>
            </li>
        </ul>
        <div id="judul">Checkout</div>
    </div>
    <div class="checkout">
        <div class="barang">
            <div id="saldo" style="font-weight:600;border-bottom: 1px solid gray;">Halo <?= $user_login["nama"]?>! Saldo anda Rp. <?= $user_login["saldo"]?></div>
            <div class="barang_apa_aja" id="collection" style="margin-bottom: 15px; margin-top: 15px; border-bottom: 1px solid gray;padding-bottom: 15px;">Barang yang anda pesan:</div>
            <div class="kurir">
            <form method="POST">
                <p style="margin-bottom: 5px;">Opsi Pengiriman: </p>
                <select id="kurirs" name='ongkir' onchange="pilihanKurir()" style="width: 50%;height: 30px;border: 2px solid black; border-radius: 3px;font-family: 'teen';font-size: 17px;">
                    <?php
                        $provinsi = mysqli_query($conn, "select * from provinsi where id_provinsi='$idprov'");
                        $idharga = "";
                        while($row = mysqli_fetch_array($provinsi)){
                            $idharga = $row["id_harga"];
                        }
                        $kirim = mysqli_query($conn, "select * from harga_pengiriman where id_harga='$idharga'");
                        $harga = "";
                        while($row = mysqli_fetch_array($kirim)){
                            $harga = $row["harga_kirim"];
                        }
                        $result = mysqli_query($conn, "select * from kurir");
                        while($row = mysqli_fetch_array($result)){
                            $nama = $row["nama_kurir"];
                            $harga2 = $harga + $row["tambahan_harga"];
                    ?>
                    <option value=<?= $harga2 ?>><?= $nama ?></option>
                    <?php
                        }
                    ?>
                </select><br>
                <p style="margin-top: 15px;margin-bottom: 10px;" id="jumBarang">Jumlah Jenis Barang: 0</p>
                <p style="margin-top: 5px;margin-bottom: 10px;" id="ongkos">Ongkos Kirim: 0</p>
                <p style="margin-top: 5px;margin-bottom: 10px;" id="TotOngkos">Subtotal Ongkos Kirim: 0</p>
            </div>
            <hr>
            <div class="Promo" style="margin-bottom: 20px;">
                <p style="margin-bottom: 5px; margin-top: 15px;">Voucher Promo: </p>
                <select id="event" onchange="pilihanEvent()" style="width: 50%;height: 30px;border: 2px solid black; border-radius: 3px;font-family: 'teen';font-size: 17px;">
                    <?php
                        $event = mysqli_query($conn, "select * from event where status='1'");
                        $idharga = "";
                        if(mysqli_num_rows($event)==0){?>
                            <option value="">Tidak Ada Voucher Promo</option>
                    <?php
                        }else{
                            while($row = mysqli_fetch_array($event)){
                                $nama = $row["nama_event"];
                                $diskon1 = $row["diskon"];
                                $diskon2 = $row["diskon (%)"];
                                $diskon = array($diskon1,$diskon2);
                        
                    ?>
                        <option value=<?= json_encode($diskon) ?>><?php
                        if($diskon1=="0") echo $nama." (".$diskon2."%).";
                        else if($diskon2=="0") echo $nama." (Rp.".$diskon1.").";
                        else echo $nama." (".$diskon2."% + Rp. ".$diskon1.").";
                         ?></option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <p style="margin-top: 15px;margin-bottom: 10px;" id="diskon2">Diskon (0%): Rp. 0</p>
                <p style="margin-top: 5px;margin-bottom: 10px;" id="diskon1">Tambahan Diskon: Rp. 0</p>
                <p style="margin-top: 5px;margin-bottom: 10px;" id="TotDiskon">Subtotal Diskon: Rp. 0</p>
            </div>
            <hr>
        </div>
        <div class="last2" id="harga">Total Harga: Rp. 0</div>
            <button class="last2" id="tombol" name="checkout2" style="font-family: 'teen';" value=''>Buat Pesanan</button>
        </form>
    </div>
    <div style="height: 24px;"></div>
</body>
<script>
    var error = <?= json_encode($error) ?>;
    if(error == -1){
        Swal.fire({
            icon: 'success',
            title: 'CheckOut',
            text: 'Yuk lanjutkan ke pembayaran!',
            showConfirmButton: false,
            timer: 1500
        });
    }else if(error == 1){
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Saldo anda kurang! Yuk isi saldo terlebih dahulu!',
            showConfirmButton: false,
            timer: 2000
        });
    }
    
    $(document).ready(function(){
        pilihanKurir();
        pilihanEvent();
    });
</script>
</html>
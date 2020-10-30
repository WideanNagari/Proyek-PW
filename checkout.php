<?php
    require_once("connection.php");
    $a = 0;
    if(isset($_POST["checkout"])){
        $a = 1;
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
            var harga = document.getElementById("kurirs").value;
            var idx = document.getElementById("kurirs").selectedIndex;
            var nama = document.getElementById("kurirs").getElementsByTagName('option')[idx].innerText;
            //harga+=harga provinsi
            document.getElementById("ongkos").innerText="Ongkos Kirim: "+harga+" ("+nama+")";
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
            <div class="barang_apa_aja"></div>
            <div class="kurir">
                <p style="margin-bottom: 5px;">Opsi Pengiriman: </p>
                <select id="kurirs" onchange="pilihanKurir()" style="width: 50%;height: 30px;border: 2px solid black; border-radius: 3px;font-family: 'teen';font-size: 17px;">
                    <?php
                        $result = mysqli_query($conn, "select * from kurir");
                        while($row = mysqli_fetch_array($result)){
                            $nama = $row["nama_kurir"];
                            $harga = $row["tambahan_harga"];
                    ?>
                    <option value="<?= $harga ?>"><?= $nama ?></option>
                    <?php
                        }
                    ?>
                </select><br>
                <p style="margin-top: 5px;margin-bottom: 15px;" id="ongkos">Ongkos Kirim: 0</p>
            </div>
            <hr>
            <div class="Promo" style="margin-bottom: 20px;">
                <p style="margin-bottom: 5px; margin-top: 15px;">Voucher Promo: </p>
                <select style="width: 50%;height: 30px;border: 2px solid black; border-radius: 3px;font-family: 'teen';font-size: 17px;">
                    <option value="-">Tidak ada voucher promo</option>
                </select>
            </div>
            <hr>
        </div>
        <div class="last2" id="harga">Total Harga: Rp. 0</div>
        <form method="POST">
            <?php //buat cookie untuk menampung barang yang dibeli?>
            <button class="last2" id="tombol" name="checkout" formaction="index.php" style="font-family: 'teen';">Buat Pesanan</button>
        </form>
    </div>
    <div style="height: 24px;"></div>
</body>
<script>
    var aa = <?php echo json_encode($a)?>;
    if(aa==1){
        Swal.fire('CheckOut','Yuk lanjutkan ke pembayaran!','success');
    }
</script>
</html>
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
    <script src="sweetalert2.all.min.js"></script>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @font-face {
            font-family: "goodTimes";
            src: url('good\ times\ rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('teen.ttf');
        }
        .swal2-popup {
            font-family: "teen";
        }
        .header{
            width: 100%;
            height: 60px;
            background: rgb(50, 50, 50);
            color: white;
            font-size: 20px;
            font-weight: 600;
            font-family: "teen";
        }
        body{
            background: linear-gradient(120deg, lightskyblue,lightcyan,lightskyblue);
        }
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        #judul{
            width: 200px;
            position: absolute;
            right: 120px;
            top: 2px;
            font-size: 45px;
            font-weight: 600;
        }
        .header ul li{
            display: inline-block;
            padding-left: 20px;
            padding-top: 17px;
        }
        .header ul li:hover{
            color: lightskyblue;
        }
        .checkout{
            width: 85%;
            height: 600px;
            margin: auto;
            margin-top: 30px;
            border: 3px solid gray;
            border-radius: 20px;
            font-family: "teen";
            font-size: 20px;
            position: relative;
            background: white;
        }
        .barang{
            width: 93%;
            height: 500px;
            margin: auto;
            margin-top: 20px;
            overflow: auto;
        }
        #last{
            position: absolute;
            bottom: 10px;
            border-top: 3px solid black;
        }
        .last2{
            display: inline-block;
            position: absolute;
        }
        #tombol{
            font-size: 23px;
            width: 180px;
            height: 50px;
            right: 45px;
            bottom: 12px;
            border-radius: 5px;
        }
        #harga{
            left: 45px;
            bottom: 15px;
            font-size: 30px;
        }
        #back{
            font-family: "teen";
            color: gray;
            border: 0px;
            font-size: 20px;
            font-weight: 600;
            background: rgb(50, 50, 50);
        }
        #back:hover{
            color: white;
        }
    </style>
    <script src="jquery-3.5.1.min.js"></script>
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
            <button class="last2" id="tombol" name="checkout" formaction="pencarian.php" style="font-family: 'teen';">Buat Pesanan</button>
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
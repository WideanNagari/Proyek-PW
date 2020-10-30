<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/myBag.css">
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
            <li><form action="" method="POST"><button type="submit" id="back">Back</button></form></li>
        </ul>
        <div id="judul">MyBag</div>
    </div>
    <div class="checkout">
        <div class="barang"></div>
        <div class="last2" id="jumlah">Jumlah Item: 10</div>
        
        <form method="POST">
            <?php //buat cookie untuk menampung barang yang dibeli?>
            <button class="last2" id="tombol" name="checkout" formaction="checkout.php" style="font-family: 'teen';">Checkout</button>
        </form>
    </div>
    <div style="height: 24px;"></div>
</body>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)){return false;}
        else{return true;}
    }
</script>
</html>
<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.5.1.min.js"></script>
    
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
            width: 155px;
            position: absolute;
            right: 100px;
            top: 0;
            font-size: 45px;
            font-weight: 600;
        }
        .header ul li{
            display: inline-block;
            padding-left: 25px;
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
            border: 3px solid gray;
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
        #jumlah{
            left: 45px;
            bottom: 15px;
            font-size: 30px;
        }
    </style>
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
</html>
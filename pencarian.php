<?php
    if(isset($_POST["checkout"])){
        echo "<script>alert('Berhasil Beli!')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        #cari{
            width:300px;
            position: absolute;
            right: 45px;
            top: 13px;
        }
        .header ul li{
            display: inline-block;
            padding-left: 25px;
            padding-top: 17px;
        }
        .header ul li:hover{
            color: lightskyblue;
        }
        .pencarian{
            font-size: 25px;
            font-family: "teen";
            width: 85%;
            margin: auto;
            margin-top: 30px;
        }
        .barang{
            margin-top: 20px;
            width: 100%;
            height: 520px;
            border: 3px solid black;
        }
    </style>
</head>
<body>
    <div class="header">
        <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <ul>
            <li>Menu 1</li>
            <li>Menu 2</li>
            <li>Menu 3</li>
            <li>Menu 4</li>
            <li>Menu 5</li>
        </ul>
        <div id="cari">
            <input type="text" placeholder=" Pencarian" style="width: 170px; height: 26px;">
            <button id="btnCari" style="width: 50px; height: 30px; background-color: lightcyan;">Cari</button>
        </div>
    </div>
    <div class="pencarian">
        <p>Hasil Pencarian: abcde fghij klmno pqrst uvwxy z ABCDE FGHIJ KLMNO PQRST UVWXY Z</p>
        <p style="font-size: 20px; margin-top: 10px;">0 barang ditemukan.</p>
        <div class="barang"></div>
    </div>
</body>
</html>
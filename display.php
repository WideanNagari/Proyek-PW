<?php
    require_once("connection.php");
    if(isset($_COOKIE["barang"])){
        $barang = json_decode($_COOKIE["barang"],true);
    }else{
        header("location: pencarian.php");
    }
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
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        .header ul li{
            display: inline-block;
            padding-left: 25px;
            padding-top: 17px;
        }
        .header ul li:hover{
            color: lightskyblue;
        }
        .display{
            font-size: 25px;
            font-family: "teen";
            width: 85%;
            height: 600px;
            margin: auto;
            margin-top: 30px;
            border: 3px solid gray;
            border-radius: 5px;
        }
        #btnBack{
            font-family: "goodTimes";
            color: gray;
            border: 0px;
            font-size: 25px;
            background: rgb(50, 50, 50);
            top: 5px;
            right: 100px;
            height: 50px;
            width: 10%;
            position: absolute;
        }
        #btnBack:hover{
            color: white;
        }
        #btn{
            font-family: "teen";
            color: white;
            border: 0px;
            line-height: 1.2;
            font-size: 18px;
            background: rgb(50, 50, 50);
            height: 60px;
            width: 50%;
            margin-left: 120px;
        }
        #btn:hover{
            color: rgb(50, 50, 50);
            background: white;
            border: 2px solid black;
        }
        #gambarr{
            width:60%;
            height:100%;
            display: inline-block;
            background:  rgb(200, 250, 250);
            border-right: 3px solid gray;
        }
        #gambar{
            width: 40%;
            margin: 50px 210px;
        }
        #status{
            width:37%;
            height:93%;
            display: inline-block;
            padding: 20px;
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
        <form action="pencarian.php" method="POST">
            <button type="submit" id="btnBack" name="back">Back</button>
        </form>
    </div>
    <div class="display" style="position:relative;">
        <div id="gambarr">
            <img src="" alt="" id="gambar">
        </div>
        <div id="status" style="position:absolute;bottom:0;">
            <p style="font-weight: 600;" id="nama">nama</p>
            <p style="font-size: 20px;margin-bottom: 15px;" id="harga">harga</p>
            <p style="margin-bottom: 15px;" id="jenis">Jenis: -</p>
            <p style="margin-bottom: 15px;" id="stok">Stok: 1</p>
            <div style="height:250px;">
                Deskripsi:
                <p style="height:160px; border: 2px solid gray;font-size:20px;padding:10px;border-radius: 5px;" id="deskripsi">awawawa</p>
            </div>
            <form action="">
                <button id="btn" type="submit">Tambahkan ke MyBag!</button>
            </form>
        </div>
    </div>
</body>
    <script>
        var barang = <?= json_encode($barang)?>;
        $(document).ready(function(){
            var judul = "gambar/"+barang["id"]+".png";
            document.getElementById("gambar").setAttribute("src",judul);
            document.getElementById("nama").innerText = barang["nama"];
            document.getElementById("harga").innerText = "Rp. "+barang["harga"];
            document.getElementById("jenis").innerText = "Jenis: " + barang["nama_jenis"];
            document.getElementById("stok").innerText = "Stok: " + barang["stok"];
            document.getElementById("deskripsi").innerText = barang["deskripsi"];
        });
    </script>
</html>
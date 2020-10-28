<?php
    require_once("connection.php");
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
        #barang{
            margin-top: 20px;
            width: 100%;
            height: 560px;
            border: 3px solid black;
            overflow: auto;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#cari").submit(function(e){
                e.preventDefault();
                document.getElementById("hasil").innerText = "Hasil Pencarian: " + $("#idQuery").val();
                $.get("cari.php", { btnCari : "aaa" , query : $("#idQuery").val() }, function(hasil){
                    $("#barang").html(hasil);
                });
            });
        });
    </script>
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
        <form id="cari">
            <input type="text" id="idQuery" name="query" placeholder=" Pencarian" style="width: 170px; height: 26px;">
            <button type="submit" id="btnCari" name="btnCari"  style="width: 50px; height: 30px; background-color: lightcyan;">Cari</button>
        </form>
    </div>
    <div class="pencarian">
        <p id="hasil">Hasil Pencarian: -</p>
        <div id="barang">
        </div>
    </div>
</body>
</html>
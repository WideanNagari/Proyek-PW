<?php
    if(isset($_POST["back"])){
        setcookie("item","",time()-1);
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
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @font-face {
            font-family: "goodTimes";
            src: url('./assets/fonts/good_times_rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('./assets/fonts/teen.ttf');
        }
        body{
            background: linear-gradient(120deg,lightcyan,lightskyblue,lightcyan);
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
        .atas{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
            padding-left: 110px;
            padding-top: 10px;
            margin-right: 170px;
        }
        .main{
            font-family: "teen";
            font-size: 20px;
            color: rgb(50, 50, 50);
            width: 85%;
            height: 630px;
            margin: auto;
            margin-top: 30px;
        }
        .menu{
            font-family: "teen";
            font-size: 20px;
            color:white;
            width: 230px;
            height: 130px;
            margin-left: 145px;
            margin-top: 80px;
            font-weight: 600;
            background: linear-gradient(120deg,black,rgb(1, 78, 104),black);
            border:0;
            border-radius: 10px;
        }
        .menu:hover,#logout:hover{
            color: black;
            background: linear-gradient(120deg,rgb(0, 191, 255),lightcyan,rgb(0, 191, 255));
            border: 2px solid black;
        }
        #logout{
            font-family: "teen";
            font-size: 20px;
            color:white;
            width: 350px;
            height: 40px;
            margin-left: 465px;
            margin-top: 80px;
            font-weight: 600;
            background: linear-gradient(120deg,black,rgb(1, 78, 104),black);
            border:0;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="atas">OutfitLabs</div>
        <p class="atas" style="margin-left: 600px;">Admin</p>
    </div>
    <div class="main">
        <h1>Welcome back, Admin</h1>
        <form method="POST">
            <button type="submit" class="menu" name="addP" formaction="tambah.php">Tambah Produk</button>
            <button type="submit" class="menu" formaction="listBarang.php">Edit Produk</button>
            <button type="submit" class="menu" formaction="historyAdmin.php">Lihat History Penjualan</button>
            <button type="submit" class="menu" name="addE" formaction="addevent.php">Tambah Event</button>
            <button type="submit" class="menu" formaction="listEvent.php">Edit Event</button>
            <button type="submit" class="menu" formaction="listUser.php">Lihat User</button><br>
            <button type="submit" class="" id="logout" name="LogOut" formaction="index.php">Log Out</button>
        </form>
    </div>
</body>
</html>
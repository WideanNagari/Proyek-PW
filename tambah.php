<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutfitLabs</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <style>
        @font-face {
            font-family: "goodTimes";
            src: url('good\ times\ rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('teen.ttf');
        }
        body{
            margin:0;
            background-color:lightskyblue;
        }
        .header{
            width: 100%;
            height: 60px;
            background: rgb(50, 50, 50);
            color: white;
            font-size: 20px;
            font-weight: 600;
            font-family: "goodTimes";           
        }
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        .outline{
            width:50%;
            height:870px;
            margin-left:25%;
            margin-top:3%;
            border:solid gray 3px;
            border-radius:20px;
            background-color:white;
        }
        input{
            background-color:lightgrey;
            width:3 00px;
            height:23px;
        }
        .contain{
            width:90%;
            margin-left:25px;
            margin-right:20px;
            height:90%;
            margin-top:5%;
            border:3px solid gray;
            border-radius:20px;
            background-color:white;
            font-family:"teen";
            padding-left:20px;
        }
        .header div:hover{
            color:lightskyblue;
            cursor:pointer;
        }
        .link{
            float:left;
            margin-left:50%;
            margin-top:15px;
        }
        button{
            width:80px;
            font-family:"teen";
            background-color:lightgrey;
            height:30px;
            margin-left:10%;
            border-radius:7px;
            font-size:17px;
        }
        button:hover{
            cursor:pointer;
        }
        

    </style>
</head>
<body>
<a href=""></a>
<div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
    <div class="link">
    <form action="" method="POST">Account</form>
    </div>
</div>
</div>
<div class="outline">
    <div class="contain">
        <form action="" method="POST">
            <h1>Barang</h1>
            ID Barang  <input type="text" name="id_barang" style="margin-left:50px;"><br> <br>
            ID Jenis <input type="text" name="id_jenis" style="margin-left:66px;"><br><br>
            Nama Barang  <input type="text" name="nama_barang" style="margin-left:18px;"><br><br>
            Harga  <input type="text" name="harga" style="margin-left:75px;"><br><br>
            Stok  <input type="text" name= "stok" style="margin-left:87px;"><br><br>
            Deskripsi: <br><textarea name="deskripsi" id="" cols="75" rows="25" style="margin-left:80px; resize:none; border-radius:7px;"></textarea>
            <button type="submit" style="display:none;">Edit</button>
            <button type="submit">Tambah</button>
        </form>
    </div>
</div>

</body>
</html>
<?php
    require_once("connection.php");
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
            margin:auto;
            margin-top:3%;
            border:solid gray 3px;
            border-radius:20px;
            background-color:white;
        }
        input{
            background-color:lightgrey;
            width:300px;
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
        button{
            width:80px;
            font-family:"teen";
            background-color:lightgrey;
            height:30px;
            border-radius:7px;
            font-size:17px;
        }
        button:hover{
            cursor:pointer;
        }
        #btnBack{
            font-family:"goodTimes";
            border: 0px;
            font-size: 25px;
            background: rgb(50, 50, 50);
            float:left;
            margin-left:50%;
            margin-top:15px;
            color:white;
        }
        #btnBack:hover{
            color:lightskyblue;
            cursor:pointer;
        }
    </style>
</head>
<body>
<a href=""></a>
<div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
    <form action="" method="POST">
        <button type="submit" id="btnBack">Back</button>
    </form>
</div>
</div>
<div class="outline">
    <div class="contain">
        <form action="" method="POST">
            <h1>Tambah Barang</h1>
            ID Barang  <input type="text" name="id_barang" style="margin-left:50px;" readonly><br> <br>
            Jenis Barang
            <select name="jenis" style="margin-left:25px;width:305px;height:30px;">
            <?php
                $result = mysqli_query($conn, "select * from jenis_barang");
                while($row = mysqli_fetch_array($result)){
                    $nama = $row["nama_jenis"];
                    $value = $row["id_jenis"];
            ?>
            <option value=<?= $value ?>><?= $nama ?></option>
            <?php
                }
            ?>
            </select><br><br>
            Nama Barang  <input type="text" name="nama_barang" style="margin-left:18px;"><br><br>
            Harga  <input type="text" name="harga" style="margin-left:76px;"><br><br>
            Stok  <input type="text" name= "stok" style="margin-left:87px;"><br><br>
            Deskripsi: <textarea name="deskripsi" id="" cols="73" rows="23" style="margin-left:91px; resize:none; border-radius:7px;padding:10px;"></textarea>
            <button type="submit" style="margin-left: 90px;" >Edit</button>
            <button type="submit">Tambah</button>
        </form>
    </div>
</div>
</body>
</html>
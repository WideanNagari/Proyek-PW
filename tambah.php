<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutfitLabs</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/tambah.css">
</head>
<body>
<a href=""></a>
<div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
    <form action="admin.php" method="POST">
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
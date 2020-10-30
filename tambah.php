<?php
    require_once("connection.php");
    $id="";
    $hide=-1;
    $barang;
    if(isset($_POST["addP"])){
        $id = "BA";
        $result = mysqli_query($conn, "select * from barang");
        $jumlah = mysqli_num_rows($result);
        $jumlah+=1;
        if($jumlah<10){
            $id = $id . "00" . $jumlah;
        }else if($jumlah<100){
            $id = $id . "0" . $jumlah;
        }else{
            $id = $id . $jumlah;
        }
        $hide = 0;
    }
    if(isset($_COOKIE["item"])){
        $hide = 1;
        $barang = json_decode($_COOKIE["item"],true);
    }
    if(isset($_POST["add"])){
        $id=$_POST["id_barang"];
        $idjenis=$_POST["jenis"];
        $nama=$_POST["nama_barang"];
        $harga=$_POST["harga"];
        $stok=$_POST["stok"];
        $desc=$_POST["deskripsi"];
        mysqli_query($conn, "insert into barang values('$id','$idjenis','$nama','$harga','$stok','$desc')");

        $id = "BA";
        $result = mysqli_query($conn, "select * from barang");
        $jumlah = mysqli_num_rows($result);
        $jumlah+=1;
        if($jumlah<10){
            $id = $id . "00" . $jumlah;
        }else if($jumlah<100){
            $id = $id . "0" . $jumlah;
        }else{
            $id = $id . $jumlah;
        }
        $hide = 0;
    }
    if(isset($_POST["edit"])){
        $id=$_POST["id_barang"];
        $idjenis=$_POST["jenis"];
        $nama=$_POST["nama_barang"];
        $harga=$_POST["harga"];
        $stok=$_POST["stok"];
        $desc=$_POST["deskripsi"];
        mysqli_query($conn,"update barang set id_jenis = '$idjenis' where id_barang='$id'");
        mysqli_query($conn,"update barang set nama_barang = '$nama' where id_barang='$id'");
        mysqli_query($conn,"update barang set harga = '$harga' where id_barang='$id'");
        mysqli_query($conn,"update barang set stok = '$stok' where id_barang='$id'");
        mysqli_query($conn,"update barang set deskripsi = '$desc' where id_barang='$id'");

        $barang2 = array(
            'id' => $id,
            'nama' => $nama,
            'harga' => $harga,
            'stok' => $stok,
            'desc' => $desc,
            'jenis' => $idjenis
        );
        $barang = $barang2;
        $hide = 1;
    }
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
        <button type="submit" id="btnBack" name="back">Back</button>
    </form>
</div>
</div>
<div class="outline">
    <div class="contain">
        <form action="" method="POST">
            <h1>Tambah Barang</h1>
            ID Barang  <input type="text" id="id" name="id_barang" style="margin-left:50px;" readonly><br> <br>
            Jenis Barang
            <select name="jenis" id="jenis" style="margin-left:25px;width:305px;height:30px;">
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
            Nama Barang  <input type="text" name="nama_barang" id="name" style="margin-left:18px;" required><br><br>
            Harga  <input type="text" name="harga" id="price" style="margin-left:76px;" required><br><br>
            Stok  <input type="text" name= "stok" id="stock" style="margin-left:87px;" required><br><br>
            Deskripsi: <textarea name="deskripsi" id="desc" cols="73" rows="23" style="margin-left:91px; resize:none; border-radius:7px;padding:10px;"></textarea>
            <button type="submit" style="margin-left: 90px;" id="ganti" name="edit">Edit</button>
            <button type="submit" style="margin-left: 90px;" id="tambah" name="add">Tambah</button>
        </form>
    </div>
</div>
</body>
<script>
    $(document).ready(function(){
        var hide = <?= json_encode($hide)?>;
        if(hide==0){
            document.getElementById("ganti").style.display = "none";
            var id = <?= json_encode($id)?>;
            document.getElementById("id").value = id;
        }else if(hide==1){
            document.getElementById("tambah").style.display = "none";
            <?php if(isset($_COOKIE["item"])){?>
            document.getElementById("id").value = <?= json_encode($barang["id"])?>;
            document.getElementById("jenis").value = <?= json_encode($barang["jenis"])?>;
            document.getElementById("name").value = <?= json_encode($barang["nama"])?>;
            document.getElementById("stock").value = <?= json_encode($barang["stok"])?>;
            document.getElementById("price").value = <?= json_encode($barang["harga"])?>;
            document.getElementById("desc").value = <?= json_encode($barang["desc"])?>;
            <?php } ?>
        }
    });
</script>
</html>
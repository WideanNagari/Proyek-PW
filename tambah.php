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
    $sukses = 0;
    $berhasil = -1;
    if(isset($_POST["add"])){
        $id=$_POST["id_barang"];
        $idjenis=$_POST["jenis"];
        $nama=$_POST["nama_barang"];
        $harga=$_POST["harga"];
        $stok=$_POST["stok"];
        $desc=$_POST["deskripsi"];
        $path = "";
        if($_FILES["myFile"]["size"]>0){
            if($_FILES["myFile"]["type"]=="image/jpeg" ||$_FILES["myFile"]["type"]=="image/png"){
                $path = "./assets/pic/$id" . "." . pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
                if(move_uploaded_file($_FILES["myFile"]["tmp_name"], $path)){
                    $berhasil = 1;
                }else{
                    $berhasil = 0;
                }
            }else{
                $berhasil = 2;
            }
        }else{
            $berhasil = 1;
        }
        if($berhasil == 1){
            $sukses = 1;
            mysqli_query($conn, "insert into barang values('$id','$idjenis','$nama','$harga','$stok','$desc','$path')");
        }
        

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
        $path = "";
        if($_FILES["myFile"]["size"]>0){
            if($_FILES["myFile"]["type"]=="image/jpeg" ||$_FILES["myFile"]["type"]=="image/png"){
                $path = "./assets/pic/$id" . "." . pathinfo($_FILES["myFile"]["name"], PATHINFO_EXTENSION);
                if(move_uploaded_file($_FILES["myFile"]["tmp_name"], $path)){
                    $berhasil = 1;
                }else{
                    $berhasil = 0;
                }
            }else{
                $berhasil = 2;
            }
        }else{
            $berhasil = 1;
        }
        if($berhasil == 1){
            $sukses = 2;
            mysqli_query($conn,"update barang set id_jenis = '$idjenis' where id_barang='$id'");
            mysqli_query($conn,"update barang set nama_barang = '$nama' where id_barang='$id'");
            mysqli_query($conn,"update barang set harga = '$harga' where id_barang='$id'");
            mysqli_query($conn,"update barang set stok = '$stok' where id_barang='$id'");
            mysqli_query($conn,"update barang set deskripsi = '$desc' where id_barang='$id'");
            if($path!="") mysqli_query($conn,"update barang set path = '$path' where id_barang='$id'");
        }

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
        <form action="" method="POST"  enctype="multipart/form-data">
            <h1 id="judul">Tambah Barang</h1>
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
            Harga  <input type="text" name="harga" id="price" style="margin-left:76px;" onkeypress="return hanyaAngka(event)" required><br><br>
            Stok  <input type="text" name= "stok" id="stock" style="margin-left:87px;" onkeypress="return hanyaAngka(event)" required><br><br>
            Import Gambar <input type="file" name="myFile" id="" style="margin-left:5px;background:white;" /><br /><br>
            Deskripsi: <textarea name="deskripsi" id="desc" cols="73" rows="23" style="margin-left:91px; resize:none; border-radius:7px;padding:10px;"></textarea>
            <button type="submit" style="margin-left: 90px;" id="ganti" name="edit">Edit</button>
            <button type="submit" style="margin-left: 90px;" id="tambah" name="add">Tambah</button>
        </form>
    </div>
</div>
</body>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)){return false;}
        else{return true;}
    }
    $(document).ready(function(){
        var hide = <?= json_encode($hide)?>;
        if(hide==0){
            document.getElementById("ganti").style.display = "none";
            var id = <?= json_encode($id)?>;
            document.getElementById("id").value = id;
            document.getElementById("judul").innerText = "Tambah Barang";
        }else if(hide==1){
            document.getElementById("tambah").style.display = "none";
            document.getElementById("judul").innerText = "Edit Barang";
            <?php if(isset($_COOKIE["item"])){?>
            document.getElementById("id").value = <?= json_encode($barang["id"])?>;
            document.getElementById("jenis").value = <?= json_encode($barang["jenis"])?>;
            document.getElementById("name").value = <?= json_encode($barang["nama"])?>;
            document.getElementById("stock").value = <?= json_encode($barang["stok"])?>;
            document.getElementById("price").value = <?= json_encode($barang["harga"])?>;
            document.getElementById("desc").value = <?= json_encode($barang["desc"])?>
            <?php } ?>
        }

        var sukses = <?php echo json_encode($sukses)?>;
        if(sukses==1){
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil menambahkan produk!',
                showConfirmButton: false,
                timer: 1500
            });
        }else if(sukses==2){
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil mengedit produk!',
                showConfirmButton: false,
                timer: 1500
            });
        }

        var sukses2 = <?php echo json_encode($berhasil)?>;
        if(sukses2==0){
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal menambahkan produk! Ada kesalahan dalam upload gambar!',
                showConfirmButton: false,
                timer: 1500
            });
        }else if(sukses2==2){
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal menambahkan produk! Mohon upload gambar berextension .jpg/.jpeg/.png!',
                showConfirmButton: false,
                timer: 2000
            });
        }
    });
</script>
</html>
<?php
    require_once("connection.php");
    $id="";
    $hide=-1;
    $barang;
    if(isset($_POST["addE"])){
        $id = "EV";
        $result = mysqli_query($conn, "select * from event");
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
    if(isset($_POST["add"])){
        if($_POST["diskon_percentage"]>100){
            echo "<script>alert('terlalu besar!')</script>";
        }else if(!isset($_POST["status1"]) && !isset($_POST["status2"])){
            echo "<script>alert('mohon isi status event!')</script>";
        }else{
            $id=$_POST["id_event"];
            $nama=$_POST["nama_event"];
            $diskon=$_POST["diskon"];
            $diskon2=$_POST["diskon_percentage"];
            $status=$_POST["status2"];
            mysqli_query($conn, "insert into event values('$id','$nama','$diskon','$diskon2',$status)");
        }
        $id = "EV";
        $result = mysqli_query($conn, "select * from event");
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
        $sukses = 1;
    }
    if(isset($_POST["edit"])){
        $id=$_POST["id_event"];
        $nama=$_POST["nama_event"];
        $diskon1=$_POST["diskon"];
        $diskon2=$_POST["diskon_percentage"];
        $status=$_POST["status2"];
        mysqli_query($conn,"update event set id_event = '$id' where id_event='$id'");
        mysqli_query($conn,"update event set nama_event = '$nama' where id_event='$id'");
        mysqli_query($conn,"update event set diskon = '$diskon1' where id_event='$id'");
        mysqli_query($conn,"update event set diskon2 = '$diskon2' where id_event='$id'");
        mysqli_query($conn,"update event set status = '$status' where id_event='$id'");
        $event = array(
            'id' => $id,
            'nama' => $nama,
            'diskon1' => $diskon1,
            'diskon2' => $diskon2,
            'status' => $status
        );
        $barang = $event;
        $hide = 1;
        $sukses = 2;
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
    <link rel="stylesheet" href="css/addevent.css">
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
            <h1>Tambah Event</h1>
            ID Event  <input type="text" id="id" name="id_event" style="margin-left:50px;" readonly><br> <br>           
            Nama Event  <input type="text" name="nama_event" id="name" style="margin-left:18px;" required><br><br>
            Diskon  <input type="text" name="diskon" id="diskon1" style="margin-left:61px;" onkeypress="return hanyaAngka(event)" required><br><br>
            Diskon (%)  <span>
            <input type="text" name= "diskon_percentage" id="diskon2" style="margin-left:36px;" onkeypress="return hanyaAngka(event)" required>
            </span>
            <span class= style="width=10%;">%</span>
            <br><br>
            Status <input type="radio" name="status2" id="rb1" value="1" style="margin-left:60px;">Aktif 
            <input type="radio" name="status2" id="rb2" value="0"> Non Aktif
            <br> <br>
            <button type="submit" id="ganti" name="edit" style="margin-left:17%;">Edit</button>
            <button type="submit" id="tambah" name="add" style="margin-left:17%;">Tambah</button>
        </form>
    </div>
</div>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)){return false;}
        else{return true;}
    }
    $(document).ready(function(){
        var id = <?= json_encode($id)?>;
        document.getElementById("id").value = id;
        var hide = <?= json_encode($hide)?>;
        if(hide==0){
            document.getElementById("ganti").style.display = "none";
        }else if(hide==1){
            document.getElementById("tambah").style.display = "none";
            <?php
                if(isset($_COOKIE["item"])){
            ?>
                document.getElementById("id").value = <?= json_encode($barang["id"])?>;
                document.getElementById("name").value = <?= json_encode($barang["nama"])?>;
                document.getElementById("diskon1").value = <?= json_encode($barang["diskon1"])?>;
                document.getElementById("diskon2").value = <?= json_encode($barang["diskon2"])?>;
                var stat = <?= json_encode($barang["status"])?>;
                if(stat==0){
                    document.getElementById("rb2").checked = true;
                }else{
                    document.getElementById("rb1").checked = true;
                }
            <?php
            }?>
        }

        var sukses = <?php echo json_encode($sukses)?>;
        if(sukses==1){
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil menambahkan event!',
                showConfirmButton: false,
                timer: 1500
            });
        }else if(sukses==2){
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil mengedit event!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
</script>
</body>
</html>
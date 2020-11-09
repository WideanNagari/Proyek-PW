<?php
    require_once("connection.php");
    if(isset($_COOKIE["barang"])){
        $barang = json_decode($_COOKIE["barang"],true);
    }else{
        header("location: index.php");
    }
    $mybag = [];
    $sukses = -1;
    if(isset($_POST["tambahkan"])){
        if(isset($_SESSION["user"])){
            $sukses = 0;
            //sudah ada 1 atau belum 0
            if(isset($_COOKIE["mybag"])){
                $mybag = json_decode($_COOKIE["mybag"],true);
                foreach($mybag as $key => $val){
                    if($val["id"]==$barang["id"]){
                        $sukses = 1;
                    }
                }
            }
            if($sukses == 0){
                $brg = array(
                    'id' => $barang["id"],
                    'nama' => $barang["nama"],
                    'harga' => $barang["harga"],
                    'stok' => $barang["stok"],
                    'deskripsi' => $barang["deskripsi"],
                    'nama_jenis' => $barang["nama_jenis"]
                );
                $brg['jumlah'] = 1;
                $mybag[] = $brg;
                setcookie("mybag",json_encode($mybag),time()+60*10);  
            } 
        }else{
            $sukses = 2;
        }
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
    <link rel="stylesheet" href="./css/display.css">
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
            <form method="POST">
                <button id="btn" name="tambahkan" type="submit">Tambahkan ke MyBag!</button>
            </form>
        </div>
    </div>
</body>
    <script>
        var barang = <?= json_encode($barang)?>;
        $(document).ready(function(){
            var judul = barang["path"];
            document.getElementById("gambar").setAttribute("src",judul);
            document.getElementById("nama").innerText = barang["nama"];
            document.getElementById("harga").innerText = "Rp. "+barang["harga"];
            document.getElementById("jenis").innerText = "Jenis: " + barang["nama_jenis"];
            document.getElementById("stok").innerText = "Stok: " + barang["stok"];
            document.getElementById("deskripsi").innerText = barang["deskripsi"];

            var sukses = <?php echo json_encode($sukses)?>;
            if(sukses==0){
                Swal.fire({
                    icon: 'success',
                    title: 'Selamat!',
                    text: 'Anda berhasil menambahkan produk ke myBag!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else if(sukses==1){
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Barang sudah ada di myBag!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else if(sukses==2){
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Mohon login terlebih dahulu!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    </script>
</html>
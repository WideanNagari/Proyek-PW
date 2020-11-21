<?php
    require_once("connection.php");
    $error = -1;
    if(isset($_GET["success"])){
        $error = 0;
    }
    $result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = p.id_transaksi AND p.status = 'onGoing' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
    $data = [];
    while($row = mysqli_fetch_array($result)){
        if(time() >= $row['time']){
            mysqli_query($conn, "UPDATE pengiriman set status = 'finished' where id_kirim='$row[id_kirim]'");
        }else{
            $dt = array(
                'nama' => $row["nama_barang"],
                'jumlah' => $row["jumlah"],
                'total' => $row["total_harga"],
                'waktu1' => $row["waktu_kirim"],
                'waktu2' => $row["waktu_sampai"],
                'status' => $row["status"]
            );
            $data[] = $dt;
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
    <link rel="stylesheet" href="./css/pengiriman.css">
    <style>
        .barang{
            font-size: 25px;
            margin-bottom: 5px;
        }
        .barang2{
            font-size: 20px;
            margin-bottom: 15px;
        }
        
    </style>
</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <form action="profile.php" method="POST">
            <button type="submit" id="btnBack">Back</button>
        </form>
    </div>
    <h1 style="font-family: 'teen'; color: rgb(38, 38, 38); margin-top:40px;text-align: center;">Pengiriman Barang</h1><br>
    <div class="divUtama">
        <div id='tb' style="margin-bottom: 20px;">Jumlah barang yang sedang diantar: 0</div>
        <div id="barang">
            <img src="./assets/pic/BA001.png" alt="">
            <div id="detail">
                <div id="nama">Adidas Athletics Graphic Tee</div>
                <div id="jumlah"> X 1</div>
            </div>
            <div id="label-waktu">
                <div id="label1">Waktu Pengiriman</div>
                <div id="label2">Waktu Sampai</div>
            </div>
            <div id="waktu">
                <div id="waktu1">21 November 2020 at 17:50</div>
                <div id="waktu2">21 November 2020 at 20:30</div>
            </div>
            <div id="status-cont">
                Status :
                <span id="status">Progress</span>
            </div>
        </div>
    </div>
</body>
<script>
    var error = <?= json_encode($error)?>;
    if(error!=-1){
        if(error==0){
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: 'Selamat anda telah berhasil memesan barang!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }
    $(document).ready(function(){
        var data = <?= json_encode($data) ?>;
        document.getElementById('tb').innerText = "Jumlah barang yang sedang diantar: "+data.length;
        for(let i=0; i<data.length; i++){
            $('.divUtama').append(`
                <div class="barang">${i+1}. ${data[i]['nama']} (${data[i]['jumlah']}) - Rp. ${data[i]['total']} - Status:  ${data[i]['status']}</div>
                <div class="barang2">Waktu Pengiriman: ${data[i]['waktu1']} - ${data[i]['waktu2']}</div>
            `);
        }
    });
</script>
</html>
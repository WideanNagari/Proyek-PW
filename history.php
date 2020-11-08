<?php
    require_once("connection.php");
    $result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = p.id_transaksi AND p.status = 'onGoing' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
    while($row = mysqli_fetch_array($result)){
        if(time() >= $row['time']){
            mysqli_query($conn, "UPDATE pengiriman set status = 'finished' where id_kirim='$row[id_kirim]'");
        }
    }
    $result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = p.id_transaksi AND p.status = 'finished' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
    $data = [];
    while($row = mysqli_fetch_array($result)){
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/history.css">
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
    <h1 style="font-family: 'teen'; color: rgb(38, 38, 38); margin-top:40px;text-align: center;">History</h1><br>
    <div class="divUtama">
        <p id='tb' style="margin-bottom: 20px;">Total Riwayat Pembelian: 0</p>
    </div>
</body>
<script>
    $(document).ready(function(){
        var data = <?= json_encode($data) ?>;
        document.getElementById('tb').innerText = "Total Riwayat Pembelian: "+data.length;
        for(let i=0; i<data.length; i++){
            $('.divUtama').append(`
                <div class="barang">${i+1}. ${data[i]['nama']} (${data[i]['jumlah']}) - Rp. ${data[i]['total']} - Status:  ${data[i]['status']}</div>
                <div class="barang2">Waktu Pengiriman: ${data[i]['waktu1']} - ${data[i]['waktu2']}</div>
            `);
        }
    });
    // var error = <?php //echo json_encode($error)?>;
    // if(error!=-1){
    //     if(error==1){
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Gagal Login',
    //             text: 'Username tidak ditemukan!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     }else if(error==2){
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Gagal Login',
    //             text: 'Password Salah!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     }else{
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Selamat!',
    //             text: 'Anda berhasil melakukan registrasi!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     }
    // }
</script>
</html>
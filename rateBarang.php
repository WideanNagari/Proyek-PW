<?php
    require_once("connection.php");
    $id= $_GET['id_trans'];
    $result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = '$id'AND p.status = 'finished' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
    $data = [];
    $sukses=-1;
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
    
    if(isset($_POST['btnrate'])){
        $rating = $_POST['inputrating'];
        mysqli_query($conn,"update transaksi set rating= '$rating' where id_transaksi='$id'");
        $sukses=1;
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
    <link rel="stylesheet" href="./css/rateBarang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <form action="history.php" method="POST">
            <button type="submit" id="btnBack">Back</button>
        </form>
    </div>
    <div id="container">
    
    </div>
    
    
    <script>
    $(document).ready(function(){
            var data = <?= json_encode($data) ?>;
                $('#container').html(`
                
                <img src="./assets/pic/BA001.png" alt="">
                <div id="detail">
                    <div id="nama">${data[0]['nama']}</div>
                    <div id="jumlah"> (X ${data[0]['jumlah']} )</div>
                    <div id="harga">Rp. ${data[0]['total']}</div>
                </div>
                
                <div id="label-waktu">
                    <div id="label1">Waktu Pengiriman</div>
                    <div id="label2">Waktu Sampai</div>
                </div>
                <div id="waktu">
                    <div id="waktu1">${data[0]['waktu1']}</div>
                    <div id="waktu2">${data[0]['waktu2']}</div>
                </div>
                
                <div id="status-cont">
                    Status :
                    <span id="status">${data[0]['status']}</span>
                </div>           
                
                <form action="" method="post">
                    <input type="text" name="inputrating" max="5" min="1">
                    <button type="submit" name="btnrate">Submit Rating</button>
                </form>
                `);
            
        });

    </script>
        
</body>

</html>
<script>
    var sukses = <?php echo json_encode($sukses)?>;
    if(sukses==1){
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'Anda berhasil memberi rating!',
            showConfirmButton: false,
            timer: 1500
        });
    }

</script>
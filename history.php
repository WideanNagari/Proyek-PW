<?php
    $error = -1;
    if(isset($_GET["error"])){
        $error=$_GET["error"];
    }
    if(isset($_GET["success"])){
        $error = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/history.css">
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
        <p>Total Riwayat Pembelian: 0</p>
    </div>
</body>
<script>
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
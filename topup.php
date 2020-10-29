<?php
    require_once("connection.php");
    // if(isset($_POST["topup"])){
    //     $user_login;
    //     $user_login["saldo"]+=$_POST["nominal"];
    //     $saldo = $user_login["saldo"];
    //     $id = $user_login["id"];
    //     mysqli_query($conn,"update customer set saldo = '$saldo' where id_customer='$id'");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/topup.css">
</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <form action="login.php" method="POST">
            <button type="submit" id="btnBack">Back</button>
        </form>
    </div>
    <div class="divform">
        <form method="post">
            <h1 style="margin-top:80px; font-size:50px;">Top Up</h1><br>
            <input type="text" name="nominal" placeholder="  Nominal Top Up" style="margin-top: 90px;" required><br><br>
            <button type="submit" name="topup" id="btn" formaction="#">Top Up!</button><br><br>
            <h2 id="saldo">Saldo anda: Rp. 0</h2>
        </form>
    </div>
</body>
<script>
    var user = <?= json_encode($user_login)?>
    $(document).ready(function(){
        document.getElementById("saldo").innerText = "Saldo anda: " + user["saldo"];
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
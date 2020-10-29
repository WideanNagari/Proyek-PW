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
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <form action="login.php" method="POST">
            <button type="submit" id="btnBack">Back</button>
        </form>
    </div>
    <div class="divform">
        <form method="post" action="loginTool.php">
            <h1>Login</h1><br>
            <input type="text" name="username" placeholder="  username" required><br><br>
            <input type="password" name="password" placeholder="  password" required><br><br>
            <input type="checkbox" name="remember"> Remember me<br><br>
            <button type="submit" name="login" id="btn">Login</button><br><br>
            <a href="register.php">Baru di OutfitLabs ? Daftar di sini</a>
        </form>
    </div>
</body>
<script>
    var error = <?php echo json_encode($error)?>;
    if(error!=-1){
        if(error==1){
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: 'Username tidak ditemukan!',
                showConfirmButton: false,
                timer: 1500
            });
        }else if(error==2){
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: 'Password Salah!',
                showConfirmButton: false,
                timer: 1500
            });
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil melakukan registrasi!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }
</script>
</html>
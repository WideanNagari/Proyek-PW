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
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @font-face {
            font-family: "goodTimes";
            src: url('good\ times\ rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('teen.ttf');
        }
        .swal2-popup {
            font-family: "teen";
        }
        .header{
            width: 100%;
            height: 60px;
            background: rgb(50, 50, 50);
            color: white;
            font-size: 20px;
            font-weight: 600;
            font-family: "teen";
        }
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        .divform{
            font-family: "teen";
            color: rgb(38, 38, 38);
            text-align: center;
            padding: 40px 0px;
            font-weight: bold;
        }

        input[type=text]{
            font-family: "teen";
            border: 0px;
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 60px;
            width: 20%;
        }

        input[type=password]{
            font-family: "teen";
            border: 0px; 
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 60px;
            width: 20%;
        }

        #btn{
            font-family: "teen";
            color: white;
            border: 0px;
            line-height: 1.2;
            font-size: 18px;
            background: rgb(50, 50, 50);
            height: 60px;
            width: 20%;
        }
        #btn:hover{
            color: rgb(50, 50, 50);
            background: white;
            border: 2px solid black;
        }
        #btnBack{
            font-family: "goodTimes";
            color: gray;
            border: 0px;
            font-size: 25px;
            background: rgb(50, 50, 50);
            margin-top: 5px;
            margin-left: 730px;
            height: 50px;
            width: 10%;
        }
        #btnBack:hover{
            color: white;
        }
        .divform a{
            color: grey;
            text-decoration: none;
        }

        .divform a:hover{
            color: black;
            text-decoration: none;
        }
    </style>
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
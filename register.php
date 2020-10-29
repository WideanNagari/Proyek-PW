<?php
    require_once("connection.php");
    $error=-1;
    if(isset($_GET["error"])){
        $error=$_GET["error"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/register.css">
</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <form action="login.php" method="POST">
            <button type="submit" id="btnBack">Back</button>
        </form>
    </div>
    <div class="divform">
        <form method="post" action="registerTool.php">
            <h1>Daftar Akun Baru</h1><br>
            <input type="text" name="username" placeholder="  username" required><br><br>
            <input type="password" name="password" placeholder="  password" required><br><br>
            <input type="password" name="confirmpassword" placeholder="  confirm password" required><br><br>
            <input type="email" name="email" placeholder="  email" required><br><br>
            <input type="text" name="alamat" placeholder="  alamat" required><br><br>
            Provinsi:<br>
            <select name="provinsi" style="width: 20%;height: 40px; margin-top: 10px; font-size: 18px;font-family: 'teen';">
            <?php
                $result = mysqli_query($conn, "select * from provinsi");
                while($row = mysqli_fetch_array($result)){
                    $nama = $row["nama_provinsi"];
                    $value = $row["id_provinsi"];
            ?>
            <option value=<?= $value ?>><?= $nama ?></option>
            <?php
                }
            ?>
            </select><br><br>
            <button type="Submit" name="daftar" id="btn">Register</button>
        </form>
    </div>
</body>
<script>
    var error = <?php echo json_encode($error)?>;
    if(error!=-1){
        if(error==1){
            Swal.fire({
                icon: 'error',
                title: 'Gagal Register',
                text: 'Password dan Confirm Password tidak sama!',
                showConfirmButton: false,
                timer: 1500
            });
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Gagal Register',
                text: 'Username sudah ada!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }
</script>
</html>
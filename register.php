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
            border: 0px;; 
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 55px;
            width: 20%;
        }

        input[type=password]{
            font-family: "teen";
            border: 0px; 
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 55px;
            width: 20%;
        }

        input[type=email]{
            font-family: "teen";
            border: 0px; 
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 55px;
            width: 20%;
        }

        #btn{
            font-family: "teen";
            color: white;
            border: 0px;
            line-height: 1.2;
            font-size: 18px;
            background: rgb(50, 50, 50);
            height: 55px;
            width: 20%;
        }
        
        #btn:hover{
            font-family: "teen";
            color: rgb(50, 50, 50);
            border: 0px;
            line-height: 1.2;
            font-size: 18px;
            background: white;
            border: 2px solid black;
            height: 55px;
            width: 20%;
        }

    </style>
</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
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
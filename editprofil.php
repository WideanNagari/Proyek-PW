<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/editprofil.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
            <form action="profile.php" method="POST">
                <button type="submit" id="btnBack">Back</button>
            </form>
        </div>
        <div class="main">
                <h1 style="margin-top:40px; font-size:50px; text-align: center;">Edit Profil</h1><br>
                <div class="judul">
                    <p style="margin-bottom: 28px;">ID : </p>
                    <p style="margin-bottom: 28px;">Username : </p>
                    <p style="margin-bottom: 30px;">Email :</p>
                    <p>Alamat : </p>
                    <p>Provinsi : </p>
                </div>
                <div class="isi">
                    <form method="post">
                        <input type="text" name="id" style="margin-top: 40px;" readonly><br><br>
                        <input type="text" name="nama" placeholder="  Username" required><br><br>
                        <input type="email" name="email" placeholder="  Email" required><br><br>
                        <input type="text" name="alamat" placeholder="  Alamat" required><br><br>
                        <select name="provinsi" id="prov" style="margin-bottom: 20px;">
                            <?php
                            $result = mysqli_query($conn, "select * from provinsi");
                            while ($row = mysqli_fetch_array($result)) {
                                $nama = $row["nama_provinsi"];
                                $value = $row["id_provinsi"];
                            ?>
                                <option value=<?= $value ?>><?= $nama ?></option>
                            <?php
                            }
                            ?>
                        </select> <br>
                        <button type="submit" name="topup" id="btn" formaction="#">Ganti!</button><br><br>
                    </form>
                </div>
        </div>
        <div class="footer">
            <div class="subscribe">
                <input type="text" name="email" placeholder="Enter your email"> <br>
                <button type="submit" name="subscribe">SUBSCRIBE</button>
            </div>
            <div class="about">
                <div class="logo">
                    <h1>OUTFIT LABS</h1>
                </div>
                <div class="help">
                    <a href="#">Help</a> <br>
                    <a href="#">About</a> <br>
                    <a href="#">Terms & Conditions</a> <br>
                    <a href="#">How To Shop</a> <br>
                </div>
                <div class="contact">
                    <h4>Contact Us</h4>
                    <p><img src="./assets/icon/telp.png"> +62 0000000000</p>
                    <p><img src="./assets/icon/email.png">  example@gmail.com</p>
                    <p><img src="./assets/icon/instagram.png">outfit.labs</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
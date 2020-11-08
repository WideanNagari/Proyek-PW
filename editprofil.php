<?php
    require_once("connection.php");
    if($user_login==null){
        header("location: index.php");
    }
    if(isset($_POST['logOut'])) {
        unset($_SESSION["user"]);
        unset($user_login);
        header("location: index.php");
        $logged = false;
    }
    
    $sukses = -1;
    if(isset($_POST["ganti"])){
        $id = $_POST["id"];
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $alamat = $_POST["alamat"];
        $provinsi = $_POST["provinsi"];
        mysqli_query($conn,"update customer set nama_customer = '$nama' where id_customer='$id'");
        mysqli_query($conn,"update customer set email = '$email' where id_customer='$id'");
        mysqli_query($conn,"update customer set alamat = '$alamat' where id_customer='$id'");
        mysqli_query($conn,"update customer set id_provinsi = '$provinsi' where id_customer='$id'");

        $user_login["nama"] = $_POST["nama"];
        $user_login["email"] = $_POST["email"];
        $user_login["alamat"] = $_POST["alamat"];
        $user_login["provinsi"] = $_POST["provinsi"];

        $_SESSION["user"] = $user_login;
        $sukses = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/editprofil.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="user.php">
                    <h1>Outfit Labs</h1>
                </a>
                <form method="POST">
                    <button type="submit" name="logOut" formaction="logout.php">
                        <img src="./assets/icon/logout.png"> <br>
                        Log Out
                    </button>
                    <button type="submit" name="shopBag" formaction="mybag.php">
                        <img src="./assets/icon/shopBag.png"> <br>
                        Shop Bag
                    </button>
                    <button type="submit" name="signIn" id="login" formaction="profile.php">
                        <img src="./assets/icon/signIn.png"> <br>
                        <?=$user_login['nama']?>
                    </button>
                </form>
            </div>
            <div class="navbar">
                <ul>
                    <div class="dropdown">
                        <li>Clothes</li>
                        <div class="dropdown-content">
                            <a href="submenu.php?type=clothes-woman">Woman</a>
                            <a href="submenu.php?type=clothes-men">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Trousers</li>
                        <div class="dropdown-content">
                            <a href="submenu.php?type=trousers-woman">Woman</a>
                            <a href="submenu.php?type=trousers-men">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Jacket</li>
                        <div class="dropdown-content">
                            <a href="submenu.php?type=jacket-woman">Woman</a>
                            <a href="submenu.php?type=jacket-men">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Bag</li>
                        <div class="dropdown-content">
                            <a href="submenu.php?type=bag-woman">Woman</a>
                            <a href="submenu.php?type=bag-men">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Shoes</li>
                        <div class="dropdown-content">
                            <a href="submenu.php?type=shoes-woman">Woman</a>
                            <a href="submenu.php?type=shoes-men">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <form method="POST">
                            <button formaction="profile.php" style="font-size:15px; margin-left: 20px;">Back</button>
                        </form>
                    </div>
                    <form action="" method="POST">
                        <div class="search-box">
                            <input type="text" name="searchText" class="search-txt" placeholder="Type to search" />
                            <a class="search-btn" href="#">
                                <button type="submit" name="search_button" formaction="pencarian.php"><img src="./assets/icon/search1.png"></img></button>
                            </a>
                        </div>
                    </form>
                </ul>
            </div>
        </div>
        <div class="main">
                <h1>Edit Profil</h1><br>
                <div class="judul">
                    <p style="margin-bottom: 28px;">ID : </p>
                    <p style="margin-bottom: 28px;">Username : </p>
                    <p style="margin-bottom: 30px;">Email :</p>
                    <p>Alamat : </p>
                    <p>Provinsi : </p>
                </div>
                <div class="isi">
                    <form method="post">
                        <input type="text" name="id" id="idUser" style="margin-top: 40px;" readonly><br><br>
                        <input type="text" name="nama" id="namaUser" placeholder="  Username" required><br><br>
                        <input type="email" name="email" id="emailUser" placeholder="  Email" required><br><br>
                        <input type="text" name="alamat" id="alamatUser" placeholder="  Alamat" required><br><br>
                        <select name="provinsi" id="prov" style="margin-bottom: 20px;">>
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
                        <button type="submit" name="ganti" id="btn">Ganti!</button><br><br>
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
<script>
    $(document).ready(function(){
        document.getElementById("idUser").value = <?= json_encode($user_login["id"])?>;
        document.getElementById("namaUser").value = <?= json_encode($user_login["nama"])?>;
        document.getElementById("emailUser").value = <?= json_encode($user_login["email"])?>;
        document.getElementById("alamatUser").value = <?= json_encode($user_login["alamat"])?>;
        document.getElementById("prov").value = <?= json_encode($user_login["provinsi"])?>;
    });

    var sukses = <?php echo json_encode($sukses)?>;
    if(sukses==1){
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'Anda berhasil mengedit profil!',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
</html>
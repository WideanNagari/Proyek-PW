<?php
    require_once("connection.php");
    $idprov = $user_login["provinsi"];
    $provinsi = "";
    $result = mysqli_query($conn, "select * from provinsi where id_provinsi='$idprov'");
    while($row = mysqli_fetch_array($result)){
        $provinsi = $row["nama_provinsi"];
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
    <link rel="stylesheet" href="./css/profile.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="home.html">
                    <h1>Outfit Labs</h1>
                </a>
                <button type="submit" name="shopBag">
                    <img src="./assets/icon/shopBag.png"> <br>
                    Shop Bag
                </button>
                <button type="submit" name="signIn">
                    <img src="./assets/icon/signIn.png"> <br>
                    Widean
                </button>
            </div>
            <div class="navbar">
                <ul>
                    <div class="dropdown">
                        <li>Clothes</li>
                        <div class="dropdown-content">
                            <a href="#">Women</a>
                            <a href="#">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Trousers</li>
                        <div class="dropdown-content">
                            <a href="#">Women</a>
                            <a href="#">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Jacket</li>
                        <div class="dropdown-content">
                            <a href="#">Women</a>
                            <a href="#">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Bag</li>
                        <div class="dropdown-content">
                            <a href="#">Women</a>
                            <a href="#">Men</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>Shoes</li>
                        <div class="dropdown-content">
                            <a href="#">Women</a>
                            <a href="#">Men</a>
                        </div>
                    </div>
                    <input type="text" name="searchText">
                    <button type="submit" name="search_button" style="padding-top: 15px;"><img src="./assets/icon/search1.png"></button>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="biodata">
                <div class="judul">
                    <p>ID :</p>
                    <p>Username :</p>
                    <p>Email :</p>
                    <p>Alamat :</p>
                    <p>Provinsi : </p>
                    <p>Saldo : </p>
                </div>
                <div class="isi">
                    <p id="id">CU001</p>
                    <p id="nama">Widean</p>
                    <p id="email">aaaa@gmail.com</p>
                    <p id="alamat">jalan jalan</p>
                    <p id="provinsi">Jawa Timur</p>
                    <p id="saldo">Rp. 36000</p>
                </div>
            </div>
            <div class="menu2">
                <form method="POST">
                    <button type="submit" formaction="pengiriman.php">Status Pengiriman</button><br>
                    <button type="submit" formaction="history.php">History Pembelian</button><br>
                    <button type="submit" formaction="topup.php">Top Up</button>
                    <button type="submit" formaction="editprofil.php">Edit Profil</button>
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
        document.getElementById("id").innerText = <?= json_encode($user_login["id"])?>;
        document.getElementById("nama").innerText = <?= json_encode($user_login["nama"])?>;
        document.getElementById("email").innerText = <?= json_encode($user_login["email"])?>;
        document.getElementById("alamat").innerText = <?= json_encode($user_login["alamat"])?>;
        document.getElementById("provinsi").innerText = <?= json_encode($provinsi)?>;
        document.getElementById("saldo").innerText = "Rp. " + <?= json_encode($user_login["saldo"])?>;
    });
</script>
</html>
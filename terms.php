<?php
require_once("connection.php");

if (isset($_POST["home"])) {
    if (isset($_SESSION["user"])) {
        header("location: user.php");
    } else {
        header("location: index.php");
    }
}

if (isset($_SESSION['user'])) {
    $user_login = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions</title>
    <link rel="stylesheet" href="css/terms.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="index.php">
                    <h1>Outfit Labs</h1>
                </a>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <form method="POST">
                        <button type="submit" name="logOut" formaction="logout.php">
                            <img src="./assets/icon/logout.png"><br>
                            Log Out
                        </button>
                        <button type="submit" name="shopBag" formaction="mybag.php">
                            <img src="./assets/icon/shopBag.png"> <br>
                            Shop Bag
                        </button>
                        <button type="submit" name="signIn" formaction="profile.php">
                            <img src="./assets/icon/signIn.png"> <br>
                            <?= $user_login['nama'] ?>
                        </button>
                    </form>
                <?php } else { ?>
                    <form method="POST">
                        <button type="submit" name="signIn" formaction="login.php">
                            <img src="./assets/icon/signIn.png"> <br>
                            Sign in
                        </button>
                    </form>
                <?php } ?>
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
            <div class="kiri">
                <a href="help.php"><button>Help</button></a>
                <a href="about.php"><button>About</button></a>
                <a href="terms.php"><button>Terms & Conditions</button></a>
                <a href="HowTS.php"><button>How To Shop</button></a>
            </div>
            <div class="kanan">
                <h2>Terms & Conditions</h2>
                <p>Latest version: 27/11/2020</p> <br> <br>
                <p>Selamat Datang di Outfit Labs. Kami menghargai privasi Anda dan kami ingin menjaga informasi pribadi Anda. Kami tidak akan mengungkapkan informasi pribadi ke pihak ketiga kecuali mungkin menjadi bagian dari pemberian pelayanan kepada anda, misalnya mengatur barang yang akan dikirim kepada Anda, melakukan kredit dan pemeriksaan keamanan lainnya.</p> <br>
                <h5>Akun Anda</h5>
                <p>Ketika Anda mendaftar untuk Layanan, Anda mungkin diminta untuk memberikan password untuk account Anda. Kami sangat menyarankan agar Anda menyimpan password rahasia setiap saat.Kami tidak bertanggung jawab atas kerugian atau kerusakan yang timbul dari hilangnya password.</p>
            </div>
        </div>
        <div class="tamb">
            <p id="last">Selamat Berbelanja!</p>
            <p id="copy">Copyright © 2020 OutfitLabs Inc. All rights reserved</p>
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
                    <a href="help.php">Help</a> <br>
                    <a href="about.php">About</a> <br>
                    <a href="terms.php">Terms & Conditions</a> <br>
                    <a href="HowTS.php">How To Shop</a> <br>
                </div>
                <div class="contact">
                    <h4>Contact Us</h4>
                    <p><img src="./assets/icon/telp.png"> +62 0000000000</p>
                    <p><img src="./assets/icon/email.png"> example@gmail.com</p>
                    <p><img src="./assets/icon/instagram.png">outfit.labs</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
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

$kurir = $conn->query("SELECT * FROM `kurir`")->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="stylesheet" href="css/help.css">
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
                <p>Latest version: 27/11/2020</p>
                <button id="b1" type="button">Bisakah saya membatalkan atau mengubah pesanan saya? </button> <br>
                <div id="t1" style="display: none;">
                    <p>Saat ini, tidak mungkin untuk membatalkan atau mengubah pesanan Anda karena kami menyiapkan pesanan Anda setelah Anda mengonfirmasi di situs web.</p>
                </div> <br>
                <button id="b2" type="button">Apa saja jenis pengirimannya? </button> <br>
                <div id="t2" style="display: none;">
                    <p>Masukkan alamat rumah atau kantor Anda di profil dan saat melakukan pembelian, kami akan mengirimkan pesanan ke kurir pilihan Anda. Ongkos kirim akan bervariasi sesuai dengan provinsi Anda:
                    </p>
                    <table border="1">
                        <thead>
                            <th>Kurir</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                            <?php foreach ($kurir as $k) { ?>
                                <tr>
                                    <td><?= $k['nama_kurir'] ?></td>
                                    <td><?= $k['tambahan_harga'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div> <br>
                <button id="b3" type="button">Bagaimana saya bisa membayar pembelian saya? </button> <br>
                <div id="t3" style="display: none;">
                    <h5>DEBIT atau CREDIT CARD</h5>
                    <p>
                        Visa, Visa Electron atau MasterCard. Pembayaran dengan kartu debit akan ditagih pada saat itu juga.
                    </p>
                </div> <br>
                <button id="b4" type="button">Bisakah saya menyimpan item yang saya suka? </button> <br>
                <div id="t4" style="display: none;">
                    <h5>MyBag</h5>
                    <p>Tambahkan item yang paling Anda sukai ke Daftar "MyBag" Anda sehingga Anda tidak melupakannya.
                        Masuk atau daftar jika Anda ingin mengaksesnya dari perangkat apa pun.</p>
                </div> <br>
            </div>
            <script>
                var btn1 = document.getElementById("b1");
                var btn2 = document.getElementById("b2");
                var btn3 = document.getElementById("b3");
                var btn4 = document.getElementById("b4");
                var tn1 = document.getElementById("t1");
                var tn2 = document.getElementById("t2");
                var tn3 = document.getElementById("t3");
                var tn4 = document.getElementById("t4");
                btn1.onclick = function() {
                    tn1.style.display = "block";
                    tn2.style.display = "none";
                    tn3.style.display = "none";
                    tn4.style.display = "none";
                }
                btn2.onclick = function() {
                    tn2.style.display = "block";
                    tn1.style.display = "none";
                    tn3.style.display = "none";
                    tn4.style.display = "none";
                }
                btn3.onclick = function() {
                    tn3.style.display = "block";
                    tn2.style.display = "none";
                    tn1.style.display = "none";
                    tn4.style.display = "none";
                }
                btn4.onclick = function() {
                    tn4.style.display = "block";
                    tn2.style.display = "none";
                    tn3.style.display = "none";
                    tn1.style.display = "none";
                }
            </script>
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
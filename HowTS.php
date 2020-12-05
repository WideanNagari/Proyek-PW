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
    <title>How To Shop</title>
    <link rel="stylesheet" href="css/howts.css">
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
                <h1 style="text-align: center;">Selamat Datang di OutfitLabs!</h1>
                <div class="isi">
                    <p style="margin-bottom: 20px; font-size: 25px;">Yuk simak beberapa langkah dibawah ini sebelum berbelanja!</p>
                    <p class="odd"> <img src="./assets/help/login.PNG">
                        1. Pastikan anda login terlebih dahulu agar bisa menambahkan barang ke MyBag.
                        Untuk login, anda bisa menekan tombol sign in yang terletak dibagian kanan atas layar anda.
                        Apabila anda belum memiliki akun, silahkan melakukan register di tab yang terletak disamping tab login.
                    </p>
                    <p class="even">
                        2. Silahkan mencari barang yang anda ingin kan.
                        Anda dapat mencari produk berdasarkan kategori dengan menekan tab navigasi yang berada dibagian atas.
                        Anda juga dapat mencari produk berdasarkan nama dengan cara mengetikkannya dibagian pencarian (logo search).
                        <img src="./assets/help/submenu.PNG">
                    </p>
                    <p class="odd"> <img src="./assets/help/addmybag.PNG">
                        3. Pilih barang yang anda ingin kan dan tekan tombol "Tambahkan Ke MyBag"
                    </p>
                    <p class="even">
                        4. Masuk ke halaman Shop Bag dan sesuaikan jumlah barang yang anda inginkan.
                        Anda juga bisa menghapus barang yang tidak jadi anda beli.
                        Bila sudah yakin, silahkan tekan tombol "Checkout".
                        <img src="./assets/help/cart.PNG">
                    </p>
                    <p class="odd">
                        <img src="./assets/help/topup.PNG">
                        5. Pastikan saldo anda cukup, bila tidak cukup, anda bisa melakukan top up saldo dihalaman profile.
                    </p>
                    <p class="even">
                        6. Silahkan atur jasa kurir yang ingin anda pakai dan voucher promo (jika ada) untuk mendapatkan potongan harga.
                        Kemudian, tekan tombol "Buat Pesanan" untuk melakukan konfirmasi.
                        <img src="./assets/help/pesan.PNG">
                    </p>
                    <p class="odd">
                        <img src="./assets/help/kirim.PNG">
                        7. Barang anda akan dikirim dengan estimasi waktu tertentu.
                        Anda dapat melihat status pengiriman barang di halaman "Status Pengiriman" yang terletak dihalaman profile.
                    </p>
                    <p class="even">
                        8. Apabila barang anda sudah sampai, anda dapat memberikan review di halaman "History Pembelian" yang terletak dihalaman Profile.
                        <img src="./assets/help/rate1.PNG">
                    </p>
                </div>
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
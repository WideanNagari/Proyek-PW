<?php
require_once("connection.php");

if (isset($_POST["checkout"])) {
    echo "<script>alert('Berhasil Beli!')</script>";
}
if (isset($_POST["back"])) {
    setcookie("barang", "", time() - 1);
}
$cari = "";
if (isset($_POST["search_button"])) {
    $cari = $_POST["searchText"];
}
if (isset($_POST["kembali"])) {
    if (isset($_SESSION["user"])) {
        header("location: user.php");
    } else {
        header("location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/pencarian.css">
</head>

<body>
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
                    <?= $user_login['nama'] ?>
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

                <form action="" method="POST" id="cari">
                    <div class="search-box">
                        <input type="text" id="idQuery" name="query" class="search-txt" placeholder="Type to search" />
                        <a class="search-btn" href="#">
                            <button type="submit" id="btnCari" name="btnCari" formaction="pencarian.php"><img src="./assets/icon/search1.png"></img></button>
                        </a>
                    </div>
                </form>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="pencarian">
            <p id="hasil">Hasil Pencarian: -</p>
            <div id="barang">
            </div>
        </div>
        <form method="POST">
            <button type="hidden" id="btnn" formaction="display.php" style="display:none;"></button>
        </form>
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
                <a href="about.php">About</a> <br>
                <a href="#">Terms & Conditions</a> <br>
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
</body>
<script>
    var hasil2;
    $(document).ready(function() {
        $("#cari").submit(function(e) {
            e.preventDefault();
            document.getElementById("hasil").innerText = "Hasil Pencarian: " + $("#idQuery").val();
            $.getJSON("cari.php", {
                btnCari: "aaa",
                query: $("#idQuery").val()
            }, function(hasil) {
                hasil2 = hasil;
                while (document.getElementById("barang").firstChild) {
                    document.getElementById("barang").removeChild(document.getElementById("barang").firstChild);
                }
                var jum = hasil2.length;
                $('#barang').append(`
                        <p style='font-size: 20px;margin-bottom: 20px;'>${jum} barang ditemukan.</p>
                    `);
                for (let i = 0; i < hasil2.length; i++) {
                    $('#barang').append(`
                            <div id="${i}" name="" class="barang2">
                                <img src="${hasil2[i]["path"]}" alt="">
                                <div class="middle"><img src="./assets/icon/search1.png"></div>
                                <p class="nama">${hasil2[i]["nama"]}</p>
                                <p class="harga">Rp. ${hasil2[i]["harga"]}</p>
                            </div>
                        `);
                    $(`#${i}`).click(function() {
                        document.getElementById(`${i}`).setAttribute("name", "query");
                        e.preventDefault();
                        $.get("sendInfo.php", {
                            query: hasil2[i]
                        }, function() {
                            document.getElementById("btnn").click();

                        });
                    });
                }
            });
        });
        var cari = <?= json_encode($cari) ?>;
        if (cari != "") {
            document.getElementById("idQuery").value = cari;
            document.getElementById("btnCari").click();
        }
    });
</script>

</html>
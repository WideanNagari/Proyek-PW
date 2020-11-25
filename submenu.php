<?php
require_once("connection.php");
$tipe = "";
$barang = [];
if (isset($_GET["type"])) {
    if ($_GET["type"] == "clothes-men") {
        $tipe = "JB001";
    } else if ($_GET["type"] == "clothes-woman") {
        $tipe = "JB002";
    } else if ($_GET["type"] == "trousers-men") {
        $tipe = "JB003";
    } else if ($_GET["type"] == "trousers-woman") {
        $tipe = "JB004";
    } else if ($_GET["type"] == "jacket-men") {
        $tipe = "JB005";
    } else if ($_GET["type"] == "bag-men") {
        $tipe = "JB006";
    } else if ($_GET["type"] == "shoes-men") {
        $tipe = "JB007";
    } else if ($_GET["type"] == "jacket-woman") {
        $tipe = "JB008";
    } else if ($_GET["type"] == "bag-woman") {
        $tipe = "JB009";
    } else if ($_GET["type"] == "shoes-woman") {
        $tipe = "JB010";
    }

    $result = mysqli_query($conn, "select * from barang where id_jenis='$tipe'");
    while ($row = mysqli_fetch_array($result)) {
        $brg = array(
            'id' => $row["id_barang"],
            'nama' => $row["nama_barang"],
            'harga' => $row["harga"],
            'stok' => $row["stok"],
            'deskripsi' => $row["deskripsi"],
            'id_jenis' => $row["id_jenis"],
            'path' => $row["path"],
            'view' => $row["view"]
        );
        $barang[] = $brg;
    }
}
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
    <title>SubMenu</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/submenu.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="index.php">
                    <h1>Outfit Labs</h1>
                </a>
                <form method="POST">
                    <?php
                    if (isset($_SESSION['user'])) { ?>
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
                    <?php } else { ?>
                        <button type="submit" name="signIn" formaction="login.php">
                            <img src="./assets/icon/signIn.png"> <br>
                            Sign in
                        </button>
                    <?php } ?>
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

        <div class="product">
            <div class="column"> </div>
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

        <form method="POST">
            <button type="hidden" id="btnn" formaction="display.php" style="display:none;"></button>
        </form>
    </div>

</body>
<script>
    var barang = <?= json_encode($barang) ?>;
    $(document).ready(function() {
        for (let i = 0; i < barang.length; i++) {
            var id = barang[i]["id"];
            var harga = barang[i]["harga"];
            var nama = barang[i]["nama"];
            var path = barang[i]["path"];
            $('.column').append(`
                    <div class="content" id=${i} name="">
                        <img src="${path}" alt="">
                        <div class="middle"><img src="./assets/icon/search1.png"></div>
                        <div class="nama">${nama}</div>
                        <div class="harga">Rp. ${harga}</div>
                    </div>
                `);
            $(`#${i}`).click(function() {
                document.getElementById(`${i}`).setAttribute("name", "query");
                $.get("sendInfo.php", {
                    query: barang[i]
                }, function(a) {
                    document.getElementById("btnn").click();
                });
            });
        }
    });
</script>

</html>
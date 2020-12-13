<?php
require_once("connection.php");
if (isset($_COOKIE["barang"])) {
    $barang = json_decode($_COOKIE["barang"], true);
    // print_r($barang);
    $id = $barang['id'];
    $view = $barang['view'] + 1;
    $conn->query("UPDATE `barang` SET `view`='$view' WHERE `id_barang` = '$id'");
} else {
    header("location: index.php");
}
$mybag = [];
$sukses = -1;

if (isset($_POST['tambahkan'])) {
    if (isset($_SESSION['user'])) {
        $id_barang = $barang["id"];
        $id_user = $_SESSION["user"]["id"];
        //echo ("<script>alert('$id_user')</script>");
        $cari = $conn->query("SELECT `id_barang` FROM `mybag` where `id_barang` = '$id_barang' and `id_user`='$id_user'")->fetch_assoc();
        if ($cari != null) {
            $sukses = 1;
        } else {
            if($barang['stok']<=0){
                $sukses = 3;
            }else{
                $result = mysqli_query($conn, "INSERT INTO `mybag` VALUES(null,'$id_user','$id_barang','1','1')");
                $sukses = 0;
            }
        }
    } else {
        $sukses = 2;
    }
}

$popular = $conn->query("SELECT * FROM `barang` ORDER by `view` DESC LIMIT 8")->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/display.css">
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
        <div class="main">
            <div class="display" style="position:relative;">
                <div id="gambarr">
                    <img src="" alt="" id="gambar">
                </div>
                <div id="status" style="position:absolute;bottom:0;">
                    <p style="font-weight: 600;" id="nama">nama</p>
                    <p style="font-size: 20px;margin-bottom: 15px;" id="harga">harga</p>
                    <p style="margin-bottom: 15px;" id="jenis">Jenis: -</p>
                    <p style="margin-bottom: 15px;" id="stok">Stok: 1</p>
                    <p style="margin-bottom: 15px;" id="rating">Rating: 1</p>
                    <div style="height:230px;">
                        Deskripsi:
                        <p style="height:160px; border: 2px solid gray;font-size:20px;padding:10px;border-radius: 5px;" id="deskripsi">awawawa</p>
                    </div>
                    <form method="POST">
                        <button id="btn" name="tambahkan" type="submit">Tambahkan ke MyBag!</button>
                    </form>
                </div>
            </div>
            <div class="popular">
                <h2>Popular</h2> <br><br>
                <div class="scroll" id="scrolls">
                </div>
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
        var judul = barang["path"];
        document.getElementById("gambar").setAttribute("src", judul);
        document.getElementById("nama").innerText = barang["nama"];
        document.getElementById("harga").innerText = "Rp. " + barang["harga"];
        document.getElementById("jenis").innerText = "Jenis: " + barang["nama_jenis"];
        document.getElementById("stok").innerText = "Stok: " + barang["stok"];
        document.getElementById("rating").innerText = "Rating: "+barang["rating"];
        document.getElementById("deskripsi").innerText = barang["deskripsi"];

        var sukses = <?php echo json_encode($sukses) ?>;
        if (sukses == 0) {
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil menambahkan produk ke myBag!',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (sukses == 1) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Barang sudah ada di myBag!',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (sukses == 2) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Mohon login terlebih dahulu!',
                showConfirmButton: false,
                timer: 1500
            });
        }else if (sukses == 3) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Stok barang kosong!',
                showConfirmButton: false,
                timer: 1500
            });
        }

        var pop = <?php echo json_encode($popular) ?>;
        for(let i = 0; i<pop.length; i++){
            pop[i]['id'] = pop[i]['id_barang'];
            pop[i]['nama'] = pop[i]['nama_barang'];
            pop[i]['rating'] = pop[i]['rate'];
            $('#scrolls').append(`
                <div class="piece" id="${i}" onclick="getPiece(${pop[i]})">
                    <div class="img1 img-hover-zoom">
                        <img src="${pop[i]['path']}">
                    </div>
                    <div class="middle">
                        <h4>${pop[i]['nama_barang']}</h4>
                        <p>Rp. ${pop[i]['harga']}</p>
                    </div>
                </div>
            `);

            $(`#${i}`).click(function() {
                document.getElementById(`${i}`).setAttribute("name", "query");
                $.get("sendInfo.php", { query: pop[i] }, function(x) {
                    document.getElementById("btnn").click();
                });
            });
        }
    });
</script>

</html>
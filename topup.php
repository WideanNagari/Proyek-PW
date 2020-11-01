<?php
require_once("connection.php");
$sukses = false;
if (isset($_POST["topup"])) {
    $user_login;
    $user_login["saldo"] += $_POST["nominal"];
    $saldo = $user_login["saldo"];
    $id = $user_login["id"];
    mysqli_query($conn, "update customer set saldo = '$saldo' where id_customer='$id'");
    $_SESSION["user"] = $user_login;
    $sukses = true;
} else {
    header("location: index.php");
}

if(isset($_POST['logOut'])) {
    unset($_SESSION["user"]);
    unset($user_login);
    header("location: index.php");
    $logged = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-TopUp</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/topup.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="user.php">
                    <h1>Outfit Labs</h1>
                </a>
                <form method="POST">
                    <button type="submit" name="logOut" formaction="index.php">
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
            <form method="post">
                <h1>Top Up</h1><br>
                <input type="text" name="nominal" placeholder="Nominal Top Up"  onkeypress="return hanyaAngka(event)" required><br><br>
                <button type="submit" name="topup" id="btn" formaction="#">Top Up!</button><br><br>
                <h3 id="saldo"><?="Saldo " . $user_login['nama'] . ": Rp. " . $user_login['saldo']?></h3>
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
                    <a href="#">About</a> <br>
                    <a href="#">Terms & Conditions</a> <br>
                    <a href="#">How To Shop</a> <br>
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
    </div>

</body>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) {
            return false;
        } else {
            return true;
        }
    }
    // var user = <?= json_encode($user_login) ?>;
    // $(document).ready(function() {
    //     document.getElementById("saldo").innerText = "Halo, " + user["nama"] + "! Saldo anda: " + user["saldo"];
    // });
    var sukses = <?php echo json_encode($sukses) ?>;
    if (sukses) {
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'Anda berhasil melakukan top up!',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>

</html>
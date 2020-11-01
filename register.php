<?php
require_once("connection.php");
$error = -1;
if (isset($_GET["error"])) {
    $error = $_GET["error"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/register.css">
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
                    Sign in
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
            <a href="login.php"><button type="" name="login">Login</button></a>
            <a href="register.php"><button type="" name="register_pilih" style="border-bottom: 1px solid black;">Register</button></a> <br>
            <form action="registerTool.php" method="post">
                How would you like us to address you? <br> <br>
                <input type="text" name="name" placeholder="Name" required> <br>
                Enter an e-mail and password to access your account wherever and whenever you like. <br> <br>
                <input type="text" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirmpassword" placeholder="Confirm password" required> <br><br>
                Complete the following details to make your purchases much quicker. <br> <br>
                <select name="provinsi">
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
                <input type="text" name="city" placeholder="Town/City"> <br>
                <input type="text" name="address" placeholder="Address"> <br>
                Select the category that interests you for a personalised experience. <br> <br>
                <input type="radio" name="check_female" value="female" class="check"> Female
                <input type="radio" name="check_male" value="male" class="check"> Male <br>
                <button type="submit" name="daftar" id="register">Create Account</button>
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
                    <p><img src="./assets/icon/email.png">  example@gmail.com</p>
                    <p><img src="./assets/icon/instagram.png">outfit.labs</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var error = <?php echo json_encode($error) ?>;
    if (error != -1) {
        if (error == 1) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal Register',
                text: 'Password dan Confirm Password tidak sama!',
                showConfirmButton: false,
                timer: 1500
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Gagal Register',
                text: 'Username sudah ada!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }
</script>

</html>
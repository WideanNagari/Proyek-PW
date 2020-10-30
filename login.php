<?php
$error = -1;
if (isset($_GET["error"])) {
    $error = $_GET["error"];
}
if (isset($_GET["success"])) {
    $error = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/login.css">
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
                    <input type="text" name="searchText">
                    <button type="submit" name="search_button" style="padding-top: 15px;"><img src="./assets/icon/search1.png"></button>
                </ul>
            </div>
        </div>
        <div class="main">
            <a href="login.php"><button type="" style="border-bottom: 1px solid black;">Login</button></a>
            <a href="register.php"><button type="" name="register">Register</button></a> <br>
            <form method="post" action="loginTool.php">
                <input type="text" name="username" placeholder="Username" required> <br>
                <input type="password" name="password" placeholder="Password" required> <br>
                <input type="radio" name="remember" checked id="check"> Keep me signed in <br>
                <button type="submit" name="login" id="login">Enter</button> <br>
                Don't have an account? <a href="register.php">Register </a>
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
                title: 'Gagal Login',
                text: 'Username tidak ditemukan!',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (error == 2) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: 'Password Salah!',
                showConfirmButton: false,
                timer: 1500
            });
        }else if(error==3){
            Swal.fire({
                icon: 'error',
                title: 'Gagal Login',
                text: 'Access Denied!',
                showConfirmButton: false,
                timer: 1500
            });
        }else{
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: 'Anda berhasil melakukan registrasi!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }
</script>

</html>
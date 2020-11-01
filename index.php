<?php
require_once("connection.php");
$logged = false;
if ($user_login != null) {
    $logged = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Index</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="home.html">
                    <h1>Outfit Labs</h1>
                </a>
                <form method="POST">
                    <button type="submit" name="shopBag" formaction="mybag.php">
                        <img src="./assets/icon/shopBag.png"> <br>
                        Shop Bag
                    </button>
                    <button type="submit" name="signIn" id="login" formaction="login.php">
                        <img src="./assets/icon/signIn.png"> <br>
                        Sign in
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
            <div class="iklan">
                <h1>TIMELESS, ELEGANT, EMPOWERING</h1>
                <h3>"What you wear is how you present yourself to the world, especially today, when human contacts are so quick. Fashion is instant language." —Miuccia Prada</h3>
                <div class="kotakKiri">
                    <h4>LIMITED TIME</h4>
                    <h2>SALE UP TO 70%</h2>
                    <button type="submit" name="belanja">SHOP NOW</button>
                </div>
                <div class="kotakKanan">
                    <h4>NEW COLLECTIONS</h4>
                    <h2>WORKING FROM HOME</h2>
                    <button type="submit" name="collection">OUR COLLECTION</button>
                </div>
            </div>
            <div class="content">
                <p>Select the line you want to shop: </p>
                <select name="content" id="content" onchange="showhide()">
                    <option value="woman">Woman</option>
                    <option value="man">Man</option>
                </select>
                <p style="float: none; text-align: center; margin-left: 0; margin-top: 50px;">FREE SHIPPING FOR ORDERS OVER RP1.000.000 AND FREE RETURNS - RETURNS EXTENDED TO 60 DAYS</p>
                <script>
                    function showhide() {
                        var show = document.getElementById('content').value;
                        if (show == "woman") {
                            document.getElementById('gbrW').style.display = "block";
                            document.getElementById('gbrM').style.display = "none";
                        } else if (show=="man") {
                            document.getElementById('gbrW').style.display = "none";
                            document.getElementById('gbrM').style.display = "block";
                        }
                    }
                </script>
                <div class="content-gbr" id="gbrW" style="display: block;">
                    <div class="contKiri">
                        <img src="./assets/pic/BA030.png">
                    </div>
                    <div class="contKanan">
                        <h2>Garments</h2>
                        <h1>READY TO WEAR CLOTHING MADE FOR A TRUE CONTEMPORARY WOMAN</h1>
                        <img src="./assets/pic/BA033.png" style="float: left;">
                        <img src="./assets/pic/BA012.png">
                    </div>
                </div>
                <div class="content-gbr" id="gbrM" style="display: none;">
                    <div class="contKiri">
                        <img src="./assets/pic/BA032.png">
                    </div>
                    <div class="contKanan">
                        <h2>Garments</h2>
                        <h1>MODERN AND SMART PIECES DESIGNED FOR THE URBAN MAN</h1>
                        <img src="./assets/pic/BA034.png" style="float: left;">
                        <img src="./assets/pic/BA031.png">
                    </div>
                </div>
            </div>
            <div class="popular">
                <h2>Popular</h2> <br><br>
                <div class="scroll">
                    <div class="piece">
                        <img src="./assets/pic/BA054.jpg">
                        <div class="middle">
                            <h4>Black Leather</h4>
                            <p>Rp,600,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA055.jpg">
                        <div class="middle">
                            <h4>Floral Crop Tee</h4>
                            <p>Rp,400,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA048.jpg">
                        <div class="middle">
                            <h4>Kirsty Knitted Two Piece</h4>
                            <p>Rp,500,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA049.jpg">
                        <div class="middle">
                            <h4>Maya Bottoms</h4>
                            <p>Rp,550,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA050.jpg">
                        <div class="middle">
                            <h4>Winter Turtleneck Pullover Dress</h4>
                            <p>Rp,450,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA051.jpg">
                        <div class="middle">
                            <h4>Winter Warmer Sweater</h4>
                            <p>Rp,650,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA052.jpg">
                        <div class="middle">
                            <h4>OH YES Hooded Sweater</h4>
                            <p>Rp,350,000</p>
                        </div>
                    </div>
                    <div class="piece">
                        <img src="./assets/pic/BA053.jpg">
                        <div class="middle">
                            <h4>Blue Work Blazer</h4>
                            <p>Rp,450,000</p>
                        </div>
                    </div>
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
</body>
<script>
    var logged = <?= json_encode($logged) ?>;
    $(document).ready(function() {
        if (logged) {
            document.getElementById("login").style.display = "none";
        }
    });
</script>

</html>
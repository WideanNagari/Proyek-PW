<?php
    require_once("connection.php");
    $logged = false;
    if($user_login!=null){
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
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="menu">
                <a href="home.html"><h1>Outfit Labs</h1></a>
                <form method="POST">
                    <button type="submit" name="shopBag" formaction="mybag.php">
                        <img src="./assets/icon/shopBag.png"> <br>
                        Shop Bag 
                    </button>
                    <button type="submit" name="signIn" id ="login" formaction="login.php">
                        <img src="./assets/icon/signIn.png"> <br> 
                        Sign in 
                    </button>
                </form>
            </div>
            <div class="navbar">
                <ul>
                    <div class="dropdown">
                        <li>NEW</li>
                        <div class="dropdown-content">
                            <a href="#">New Now Woman</a>
                            <a href="#">New Now Man</a>
                            <a href="#">New Now Girl</a>
                            <a href="#">New Now Boy</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>WOMEN</li>
                        <div class="dropdown-content">
                            <a href="#">Jackets</a>
                            <a href="#">Suits</a>
                            <a href="#">Dresses</a>
                            <a href="#">Jumpsuits</a>
                            <a href="#">Cardigans and sweaters</a>
                            <a href="#">Shirts</a>
                            <a href="#">T-shirts and tops</a>
                            <a href="#">Jeans</a>
                            <a href="#">Shorts</a>
                            <a href="#">Skirts</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>MEN</li>
                        <div class="dropdown-content">
                            <a href="#">Coats</a>
                            <a href="#">Jackets</a>
                            <a href="#">Cardigans and sweaters</a>
                            <a href="#">Blazers</a>
                            <a href="#">Shirts</a>
                            <a href="#">T-shirts</a>
                            <a href="#">Underwear and pyjamas</a>
                            <a href="#">Jeans</a>
                            <a href="#">Trousers</a>
                            <a href="#">Suits</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>GIRLS</li>
                        <div class="dropdown-content">
                            <a href="#">Teen</a>
                            <a href="#">Girls</a>
                            <a href="#">Baby Girls</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>BOYS</li>
                        <div class="dropdown-content">
                            <a href="#">Teen</a>
                            <a href="#">Boys</a>
                            <a href="#">Baby Boys</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <li>PLUS SIZE</li>
                        <div class="dropdown-content">
                            <a href="#">Coats</a>
                            <a href="#">Jackets</a>
                            <a href="#">Suits</a>
                            <a href="#">Dresses and jumpsuits</a>
                            <a href="#">Cardigans and sweaters</a>
                            <a href="#">Shirts</a>
                            <a href="#">T-shirts and tops</a>
                            <a href="#">Jeans</a>
                            <a href="#">Trousers</a>
                            <a href="#">Skirts</a>
                        </div>
                    </div>
                    <input type="text" name="searchText"> 
                    <button type="submit" name="search_button" style="padding-top: 15px;"><img src="./assets/icon/search1.png"></button>
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
                <select name="content">
                    <option value="woman">Woman</option>
                    <option value="man">Man</option>
                    <option value="girl">Girl</option>
                    <option value="boy">Boy</option>
                </select>
                <p style="float: none; text-align: center; margin-left: 0; margin-top: 50px;">FREE SHIPPING FOR ORDERS OVER RP1.000.000 AND FREE RETURNS - RETURNS EXTENDED TO 60 DAYS</p>
                <div class="content-gbr">
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
                    <p><img src="./assets/icon/email.png">  example@gmail.com</p>
                    <p><img src="./assets/icon/instagram.png">outfit.labs</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var logged = <?= json_encode($logged) ?>;
    $(document).ready(function(){
        if(logged){
            document.getElementById("login").style.display = "none";
        }
    });
</script>
</html>
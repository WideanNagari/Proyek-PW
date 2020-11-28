<?php
require_once("connection.php");
if (isset($_COOKIE['userLog'])) {
    $_SESSION['user'] = json_decode($_COOKIE['userLog'], true);
    header("location: user.php");
}
if ($user_login != null) {
    header("location: user.php");
}
$popular = $conn->query("SELECT * FROM `barang` ORDER by `view` DESC LIMIT 8")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Index</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="all-container">
        <div class="header">
            <div class="menu">
                <a href="index.php">
                    <h1>Outfit Labs</h1>
                </a>
                <form method="POST">
                    <button type="submit" name="signIn" id="login" formaction="login.php">
                        <img src="./assets/icon/signIn.png"> <br>
                        Sign in
                    </button>
                </form>
            </div>
            <div class="navigasi">
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
                <h3>"What you wear is how you present yourself to the world, especially today, when human contacts are
                    so quick. Fashion is instant language." —Miuccia Prada</h3> <br>
                <div class="container" style="width: 100%;">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" style="width: 100%;">
                            <div class="item active">
                                <img src="./assets/banner/banner_7.jpg" style="height: 720px; width: 100%;">
                            </div>
                            <div class="item">
                                <img src="./assets/banner/banner_5.jpg" style="height: 720px; width: 100%;">
                            </div>
                            <div class="item">
                                <img src="./assets/banner/banner_6.jpg" style="height: 720px; width: 100%;">
                            </div>
                            <div class="item">
                                <img src="./assets/banner/banner_8.jpg" style="height: 720px; width: 100%;">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
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
                        } else if (show == "man") {
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
                    <a href="submenu.php?type=clothes-woman">
                        <button id="more">More
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="padding-top: 10px;">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </a>
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
                    <a href="submenu.php?type=clothes-men">
                        <button id="more">More
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="padding-top: 10px;">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </a>
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
    </div>
    <form method="POST">
        <button type="hidden" id="btnn" formaction="display.php" style="display:none;"></button>
    </form>
</body>
<script>
    $(document).ready(function() {
        var pop = <?php echo json_encode($popular) ?>;
        for(let i = 0; i<pop.length; i++){
            pop[i]['id'] = pop[i]['id_barang'];
            pop[i]['nama'] = pop[i]['nama_barang'];
            $('#scrolls').append(`
                <div class="piece" id="${i}" onclick="getPiece(${pop[i]})">
                    <div class="img1">
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
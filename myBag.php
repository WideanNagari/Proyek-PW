<?php
require_once("connection.php");
if ($user_login == null) {
    header("location: index.php");
}
if (isset($_POST['logOut'])) {
    unset($_SESSION['user']);
    unset($user_login);
    header("location: index.php");
    $logged = false;
}
$mybag = [];
if (isset($_COOKIE["mybag"])) {
    $mybag = json_decode($_COOKIE["mybag"], true);
    //print_r($mybag);
}
if (isset($_POST["hapus"])) {
    setcookie("mybag", "", time() - 1);
}
$gagal = -1;
if (isset($_POST['checkout'])) {
    if (isset($_SESSION["mycart"])) {
        $mycart = json_encode($_SESSION['mycart']);
        if (count($mycart) > 0) {
            header("location: checkout.php");
        } else {
            $gagal = 1;
        }
    } else {
        $gagal = 1;
    }
}

$mycart = $_SESSION['mycart'] ?? [];
//print_r($mycart);

if (isset($_POST['addCart'])) {
    $id = $_POST['addCart'];
    foreach ($mybag as $bag) {
        if ($bag['id'] == $id) $barang = $bag;
    }
    if ($mycart != null) {
        $found = false;
        foreach ($mycart as $cart) {
            if ($cart['id'] == $id) {
                $cart['jumlah'] += 1;
                echo ("<script>alert('Barang sudah ada di Cart')</script>");
                $found = true;
            }
        }
        if (!$found) {
            $brg = array(
                'id' => $barang["id"],
                'nama' => $barang["nama"],
                'harga' => $barang["harga"],
                'stok' => $barang["stok"],
                'deskripsi' => $barang["deskripsi"],
                'nama_jenis' => $barang["nama_jenis"],
                'path' => $barang["path"]
            );
            $brg['jumlah'] = 1;
            array_push($mycart, $brg);
            $_SESSION['mycart'] = $mycart;

            // foreach ($mybag as $key => $bag) {
            //     if ($bag['id'] == $id) {
            //         unset($mybag[$key]);
            //     }
            // }
            // $_COOKIE['mybag'] = $mybag;
        }
    } else {
        $mycart = array();
        $brg = array(
            'id' => $barang["id"],
            'nama' => $barang["nama"],
            'harga' => $barang["harga"],
            'stok' => $barang["stok"],
            'deskripsi' => $barang["deskripsi"],
            'nama_jenis' => $barang["nama_jenis"],
            'path' => $barang["path"]
        );
        $brg['jumlah'] = 1;
        //$mycart[] = $brg;
        array_push($mycart, $brg);
        $_SESSION['mycart'] = $mycart;

        // foreach ($mybag as $key => $bag) {
        //     if ($bag['id'] == $id) {
        //         unset($mybag[$key]);
        //     }
        // }
        // $_COOKIE['mybag'] = $mybag;
    }
}

if (isset($_POST['removeCart'])) {
    $mycart = $_SESSION['mycart'] ?? [];
    $id = $_POST['removeCart'];
    foreach ($mycart as $key => $cart) {
        if ($cart['id'] == $id) {
            //array_push($mybag, $cart);
            //$_SESSION['mybag'] = $mybag;
            unset($mycart[$key]);
        }
    }
    $_SESSION['mycart'] = $mycart;
    //print_r($_SESSION['mycart']);
}

if (isset($_POST['removeBag'])) {
    $id = $_POST['removeBag'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Bag</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/myBag.css">
    <script src="./assets/sweetalert2.all.min.js"></script>
    <!-- <script src="./js/myBag.js" async></script> -->
</head>

<body>
    <div class="all-container">
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
            <!-- <div class="checkout">
                <div class="barang" id="brg">
                    <div>
                        <div class="titlee" style="width:430px;">Item</div>
                        <div class="titlee" style="width:250px;">Price</div>
                        <div class="titlee">Quantity</div>
                        <div class="titlee" style="margin-right:0;">Remove</div>
                    </div>
                </div>
                <div class="last2" id="jumlah">Jumlah Item: 10</div>
                <div class="last2" id="harga">Harga: Rp. 10000000</div>
                <form method="POST">
                    <button class="last2" id="tombol" name="checkout" style="font-family: 'teen';">Checkout</button>
                </form>
                <form method="POST">
                    <button type="hidden" name="hapus" id="btnn" style="display:none;"></button>
                </form>
            </div> -->
            <form method="post">
                <section class="container content-section">
                    <h2 class="section-header">MY BAG</h2>
                    <div class="shop-items">
                        <?php
                        foreach ($mybag as $bag) { ?>
                            <div class="shop-item">
                                <span class="shop-item-title"><?= $bag['nama'] ?></span>
                                <img class="shop-item-image" src="<?= $bag['path'] ?>">
                                <div class="shop-item-details">
                                    <span class="shop-item-price"><?= "Rp. " . $bag['harga'] ?></span>
                                    <button class="btn btn-primary shop-item-button" type="submit" name="addCart" value="<?= $bag['id'] ?>">ADD TO CART</button>
                                    <button class="btn btn-danger" type="button" name="removeBag" value="<?= $bag['id'] ?>">REMOVE</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                <section class="container content-section">
                    <h2 class="section-header">CART</h2>
                    <div class="cart-row">
                        <span class="cart-item cart-header cart-column">ITEM</span>
                        <span class="cart-price cart-header cart-column">PRICE</span>
                        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                    </div>
                    <div class="cart-items">
                        <?php
                        foreach ($mycart ?? [] as $cart) { ?>
                            <div class="cart-row">
                                <div class="cart-item cart-column">
                                    <img class="cart-item-image" src="<?= $cart['path'] ?>" width="100" height="100">
                                    <span class="cart-item-title"><?= $cart['nama'] ?></span>
                                </div>
                                <span class="cart-price cart-column"><?= "Rp. " . $cart['harga'] ?></span>
                                <div class="cart-quantity cart-column">
                                    <input class="cart-quantity-input" type="number" min="1" max='<?=$cart['stok']?>' value="<?= $cart['jumlah'] ?>">
                                    <button class="btn btn-danger" type="submit" name="removeCart" value="<?= $cart['id'] ?>">REMOVE</button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="cart-total">
                        <strong class="cart-total-title">Total</strong>
                        <span class="cart-total-price">Rp.0</span>
                    </div>
                    <button class="btn btn-primary btn-purchase" type="submit" name="checkout">PURCHASE</button>
                </section>
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
    </div>
</body>
<script>
    // function hanyaAngka(event) {
    //     var angka = (event.which) ? event.which : event.keyCode
    //     if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    // function gantiJumlah(value, id) {
    //     mybag[id]["jumlah"] = value;
    //     var total = 0;
    //     var idd = id;
    //     for (let i = 0; i < mybag.length; i++) {
    //         total += (Number(mybag[i]["harga"]) * mybag[i]["jumlah"]);
    //     }
    //     document.getElementById("harga").innerText = "Harga: Rp. " + total;
    //     document.getElementById(id).setAttribute("name", "query2");
    //     $.get("sendInfo.php", {
    //         query2: mybag
    //     }, function() {});
    // }

    // function inputJumlah(value, max, id) {
    //     if (Number(value) > Number(max)) {
    //         document.getElementById(id).value = max;
    //     }
    //     gantiJumlah(value, id);
    // }

    // var mybag = <?= json_encode($mybag) ?>;
    // $(document).ready(function() {
    //     var total = 0;
    //     for (let i = 0; i < mybag.length; i++) {
    //         total += (Number(mybag[i]["harga"]) * mybag[i]["jumlah"]);
    //     }
    //     document.getElementById("jumlah").innerText = "Jumlah Item: " + mybag.length;
    //     document.getElementById("harga").innerText = "Harga: Rp. " + total;
    //     for (let i = 0; i < mybag.length; i++) {
    //         var id = mybag[i]["id"];
    //         var harga = mybag[i]["harga"];
    //         var nama = mybag[i]["nama"];
    //         var max = mybag[i]["stok"];
    //         var jumlah = mybag[i]["jumlah"];
    //         // $('.barang').append(`
    //         //     <div class="barang2" id="ke${i}">
    //         //         <div class="isi" style="width:430px;">${nama}</div>
    //         //         <div class="isi" style="width:250px;">Rp. ${harga}</div>
    //         //         <input type="number" name="" id="${i}" value="${jumlah}" min="1" max="${max}" oninput="inputJumlah(value,max,id)" onchange="gantiJumlah(value,id)" class="isi" style="width:125px;height:20px;border:2px solid black;position:relative; bottom: 3px;">
    //         //         <div class="isi" style="margin-right:0;"><button id=remove${i} name="" style="width:115px;height:25px;border:2px solid black;position:relative;padding:0;bottom:3px;">Remove</button></div>
    //         //     </div>
    //         // `);
    //         $('.shop-items').append(`
    //             <div class="shop-item" id="ke${i}>
    //                     <span class="shop-item-title">${nama}</span>
    //                     <img class="shop-item-image" src="./assets/pic/BA004.png">
    //                     <div class="shop-item-details">
    //                         <span class="shop-item-price">Rp. ${harga}</span>
    //                         <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    //                     </div>
    //                 </div>
    //             `);
    //         document.getElementById(`remove${i}`).setAttribute("nomor", id);
    //         $(`#remove${i}`).click(function() {
    //             var j;
    //             for (let ii = 0; ii < mybag.length; ii++) {
    //                 if (mybag[ii]["id"] == document.getElementById(`remove${i}`).getAttribute("nomor")) {
    //                     j = ii;
    //                 }
    //             }
    //             mybag.splice(j, 1);

    //             var total = 0;
    //             for (let i = 0; i < mybag.length; i++) {
    //                 total += (Number(mybag[i]["harga"]) * mybag[i]["jumlah"]);
    //             }
    //             document.getElementById("harga").innerText = "Harga: Rp. " + total;
    //             if (mybag.length > 0) {
    //                 document.getElementById(`remove${i}`).setAttribute("name", "query2");
    //                 $.get("sendInfo.php", {
    //                     query2: mybag
    //                 }, function() {});
    //                 document.getElementById("brg").removeChild(document.getElementById(`ke${i}`));
    //             } else {
    //                 document.getElementById(`remove${i}`).setAttribute("name", "query3");
    //                 $.get("sendInfo.php", {
    //                     query3: ""
    //                 }, function() {
    //                     document.getElementById("brg").removeChild(document.getElementById(`ke${i}`));
    //                     document.getElementById("btnn").click();
    //                 });

    //             }
    //         });
    //     }
    // });
    var error = <?php echo json_encode($gagal) ?>;
    if (error == 1) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal CheckOut',
            text: 'MyCart Kosong! Silahkan Masukkan Barang ke MyCart Anda!',
            showConfirmButton: false,
            timer: 2000
        });
    }
</script>

</html>
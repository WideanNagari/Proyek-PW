<?php
require_once("connection.php");
$id = $_GET['id_trans'];
$result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = '$id'AND p.status = 'finished' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
$data = [];
$sukses = -1;
while ($row = mysqli_fetch_array($result)) {
    $dt = array(
        'nama' => $row["nama_barang"],
        'jumlah' => $row["jumlah"],
        'total' => $row["total_harga"],
        'waktu1' => $row["waktu_kirim"],
        'waktu2' => $row["waktu_sampai"],
        'status' => $row["status"],
        'rating' => $row["rating"]
    );
    $data[] = $dt;
}

if (isset($_POST['btnrate'])) {
    $rating = $_POST['inputrating'];
    mysqli_query($conn, "update transaksi set rating= '$rating' where id_transaksi='$id'");
    $sukses = 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Barang</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/rateBarang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <div id="container"></div>
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

</html>
<script>
    var sukses = <?php echo json_encode($sukses) ?>;
    if (sukses == 1) {
        Swal.fire({
            icon: 'success',
            title: 'Selamat!',
            text: 'Anda berhasil memberi rating!',
            showConfirmButton: false,
            timer: 1500
        });
    }
    $(document).ready(function() {
        var data = <?= json_encode($data) ?>;
        $('#container').html(`
                <div class="divkiri">
                    <img src="./assets/pic/BA001.png" alt="">
                    <div id="detail">
                        <div id="nama">${data[0]['nama']}</div>
                        <div id="jumlah"> (X ${data[0]['jumlah']} )</div>
                        <div id="harga">Rp. ${data[0]['total']}</div>
                    </div>
                </div>
                <div class="divtengah"> 
                    <div id="label-waktu">
                        <div id="label1">Waktu Pengiriman: </div>
                        <div id="waktu1">${data[0]['waktu1']}</div> <br>
                        <div id="label2">Waktu Sampai: </div> 
                        <div id="waktu2">${data[0]['waktu2']}</div> <br>
                    </div>
                
                    <div id="status-cont">
                        Status :
                        <span id="status">${data[0]['status']}</span>
                    </div>  
                </div>
                <div class="divkanan"> 
                    <form action="" method="post">
                        <input type="number" name="inputrating" max="5" min="1" value="${data[0]['rating']}">
                        <button type="submit" name="btnrate">Submit Rating</button>
                    </form>
                </div>
                `);

    });
</script>
<?php
require_once("connection.php");
$result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = p.id_transaksi AND p.status = 'onGoing' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
while ($row = mysqli_fetch_array($result)) {
    if (time() >= $row['time']) {
        mysqli_query($conn, "UPDATE pengiriman set status = 'finished' where id_kirim='$row[id_kirim]'");
    }
}
$result = mysqli_query($conn, "SELECT * FROM pengiriman p JOIN transaksi t ON t.id_transaksi = p.id_transaksi AND p.status = 'finished' JOIN customer c ON c.id_customer='$user_login[id]' AND c.id_customer = t.id_customer");
$data = [];
while ($row = mysqli_fetch_array($result)) {
    $dt = array(
        'nama' => $row["nama_barang"],
        'jumlah' => $row["jumlah"],
        'total' => $row["total_harga"],
        'waktu1' => $row["waktu_kirim"],
        'waktu2' => $row["waktu_sampai"],
        'status' => $row["status"],
        'id_trans' => $row["id_transaksi"]
    );
    $data[] = $dt;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/history.css">
    <style>
        .barang {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .barang2 {
            font-size: 20px;
            margin-bottom: 15px;
        }
    </style>
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
            <h1 style="font-family: 'teen'; color: rgb(38, 38, 38); margin-top:40px;text-align: center;">History</h1><br>
            <div class="divUtama">
                <p id='tb' style="margin-bottom: 20px;">Total Riwayat Pembelian: 0</p>
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
    $(document).ready(function() {
        var data = <?= json_encode($data) ?>;
        document.getElementById('tb').innerText = "Total Riwayat Pembelian: " + data.length;
        for (let i = 0; i < data.length; i++) {
            $('.divUtama').append(`
            <div class="container">
            <img src="./assets/pic/BA001.png" alt="">
            <div id="detail" class="detail">
                <div class="nama" id="nama">${data[i]['nama']}</div>
                <div class="jumlah" id="jumlah"> (X ${data[i]['jumlah']} )</div>
                <div class="harga" id="harga">Rp. ${data[i]['total']}</div>
            </div>
            
            <div id="label-waktu" class="label-waktu">
                <div class="label1" id="label1">Waktu Pengiriman</div>
                <div class="label2" id="label2">Waktu Sampai</div>
            </div>
            <div class="waktu" id="waktu">
                <div class="waktu1" id="waktu1">${data[i]['waktu1']}</div>
                <div class="waktu2" id="waktu2">${data[i]['waktu2']}</div>
            </div>
            
            <div class="status-cont" id="status-cont">
                Status :
                <span class="status" id="status">${data[i]['status']}</span>
            </div>           
            <form action='rateBarang.php?id_trans=${data[i]['id_trans']}' method='post'>
                <button type='submit' class="rate">Rate This Product</button>
            </form>
            
        </div>
            `);
        }
    });

    // var error = <?php //echo json_encode($error)
                    ?>;
    // if(error!=-1){
    //     if(error==1){
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Gagal Login',
    //             text: 'Username tidak ditemukan!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     }else if(error==2){
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Gagal Login',
    //             text: 'Password Salah!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     }else{
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Selamat!',
    //             text: 'Anda berhasil melakukan registrasi!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     }
    // }
</script>

</html>
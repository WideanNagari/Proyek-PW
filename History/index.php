<?php 
    session_start();
    include 'koneksi.php';

    $sql = "SELECT nama_customer FROM customer";
    $result = $database->query($sql);
?>

<html lang="en">
    <!-- begin : : head -->
    <head>
    <link rel="stylesheet" href="index.css">
    </head>
    <!-- end : : head -->
    <!-- begin : : body -->
    <body>
        <!-- begin : : header-->
        <div class="header" style="background: whitesmoke;">
            <div class="logo">
                <a href="index.php" style="color: black; text-decoration: none;">
                    Outfit Labs
                </a>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                </ul>
            </div>
            <div class="logout-socmed">
                <h1>Logout</h1>
                <div class="social-media">
                    <img src="assets/social media.png" alt="social media">
                    <img src="assets/social media.png" alt="social media">
                    <img src="assets/social media.png" alt="social media">
                    <img src="assets/social media.png" alt="social media">
                </div>
            </div>
        </div>
        <!-- end : : header -->
        <!-- begin : : address -->
        <div class="address">
            <h1>Home</h1>
            <h1>>></h1>
            <h1>History</h1>
        </div>
        <!-- end : : address -->
        <!-- begin : : main -->
        <div class="main">
            <div class="greet">
                <p>Welcome to your order history, </p>
                <p style="color: rgb(51, 51, 51); font-size: 20px;">Admin</p><br>
                <p style="font-size: 10pt;"><i>Below you can see all the order you have done.</i></p><br><br>
                <div class="table">
                    <form action="" method="POST">
                        <label for="history">Choose:</label>
                        <select name="user">
                            <option value="All">All</option>
                            <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value=\"" . $row["nama_customer"] . "\">" . $row["nama_customer"] . "</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                            ?>
                        </select>
                        <input type="submit" name="submit" value="Choose" style="background: rgb(51, 51, 51);">
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $user = $_POST['user'];
                        if ($user == "All"){
                            $sql = "SELECT transaksi.id_barang, customer.nama_customer, transaksi.total_harga
                            FROM transaksi
                            INNER JOIN customer
                            ON transaksi.id_customer=customer.id_customer";
                            $result = $database->query($sql);
                            echo "<table style=\"width:50%\">";
                            echo "<tr>";
                            echo "<th style=\"background: rgb(51, 51, 51)\">Name</th>";
                            echo "<th style=\"background: rgb(51, 51, 51)\">Item</th>";
                            echo "<th style=\"background: rgb(51, 51, 51)\">Total</th>";
                            echo "</tr>";
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>" . $row["nama_customer"] . "</td>";
                                    echo "<td>" . $row["id_barang"] . "</td>";
                                    echo "<td>" . $row["total_harga"] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }else {
                            $sql = "SELECT transaksi.id_barang, customer.nama_customer, transaksi.total_harga
                            FROM transaksi
                            INNER JOIN customer
                            ON transaksi.id_customer=customer.id_customer
                            WHERE customer.nama_customer = '".$user."' ";
                            $result = $database->query($sql);
                            echo "<table style=\"width:50%\">";
                            echo "<tr>";
                            echo "<th style=\"background: rgb(51, 51, 51)\">Name</th>";
                            echo "<th style=\"background: rgb(51, 51, 51)\">Item</th>";
                            echo "<th style=\"background: rgb(51, 51, 51)\">Total</th>";
                            echo "</tr>";
                            if($result ->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>";
                                    echo "<td>" . $row["nama_customer"] . "</td>";
                                    echo "<td>" . $row["id_barang"] . "</td>";
                                    echo "<td>" . $row["total_harga"] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        echo "</table>";
                    }
                    $database->close();
                    ?>
                </div>
            </div>
            <div class="menu">
                <h1>Your Account</h1><hr>
                <ul>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                    <li><a href="menu">Menu</a></li>
                </ul>
                <h1>Logout</h1>
            </div>
        </div>
        <!-- end : : main -->
    </body>
    <!-- end : : body -->
</html>
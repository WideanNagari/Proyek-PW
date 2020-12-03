<?php
    if(isset($_POST["back"])){
        setcookie("item","",time()-1);
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
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="header">
        <div class="atas">OutfitLabs</div>
        <p class="atas">Admin</p>
    </div>
    <div class="main">
        <h1>Welcome back, Admin</h1>
        <form method="POST">
            <button type="submit" class="menu" name="addP" formaction="tambah.php">Tambah Produk</button>
            <button type="submit" class="menu" formaction="listBarang.php">Edit Produk</button>
            <button type="submit" class="menu" formaction="historyAdmin.php">Lihat History Penjualan</button>
            <button type="submit" class="menu" name="addE" formaction="addevent.php">Tambah Event</button>
            <button type="submit" class="menu" formaction="listEvent.php">Edit Event</button>
            <button type="submit" class="menu" formaction="listUser.php">Lihat User</button><br>
            <button type="submit" class="" id="logout" name="LogOut" formaction="index.php">Log Out</button>
        </form>
    </div>
</body>
</html>
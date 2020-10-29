<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutfitLabs</title>   
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./css/addevent.css">
</head>
<body>
<a href=""></a>
<div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
    <form action="admin.php" method="POST">
        <button type="submit" id="btnBack">Back</button>
    </form>
</div>
</div>
<div class="outline">
    <div class="contain">
        <form action="" method="POST">
            <h1>Tambah Event</h1>
            ID Event  <input type="text" name="id_event" style="margin-left:50px;" readonly><br> <br>           
            Nama Event  <input type="text" name="nama_event" style="margin-left:18px;"><br><br>
            Diskon  <input type="text" name="diskon" style="margin-left:61px;"><br><br>
            Diskon (%)  <span>
            <input type="text" name= "diskon_percentage" style="margin-left:36px;">
            </span>
            <span class= style="width=10%;">%</span>
            <br><br>
            Status <input type="radio" name="status" value="1" style="margin-left:60px;">Aktif 
            <input type="radio" name="status" value="0"> Non Aktif
            <br> <br>
            <button type="submit" style="margin-left:17%;">Edit</button>
            <button type="submit">Tambah</button>
        </form>
    </div>
</div>

</body>
</html>
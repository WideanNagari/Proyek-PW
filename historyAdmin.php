<?php 
    require_once("connection.php");

    $sql = "SELECT nama_customer, id_customer FROM customer";
    $result = $conn->query($sql);
    $results = mysqli_query($conn, "select nama_customer from customer");
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History</title>
        <script src="./assets/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="./css/historyAdmin.css">
    </head>
    <body>
        <div class="header">
            <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
            <form action="admin.php" method="POST">
                <button type="submit" id="btnBack">Back</button>
            </form>
        </div>
        <div class="address">
            History
        </div>
        <div class="main">
            <div class="greet">
                <p>Selamat Datang, </p>
                <p style="color: rgb(51, 51, 51); font-weight: bold;">Admin</p><br>
                <p style="font-size: 18px;"><i>Dibawah ini anda dapat melihat semua pesanan yang telah diselesaikan.</i></p><br><br>
                <div class="table">
                    <form action="" method="POST">
                        <label for="history" style="font-size: 18px;">Pilih:</label>
                        <select name="user" class="pilihan" id="users2">
                            <option value="All">All</option>
                            <?php
                                while($row = mysqli_fetch_array($result)){?>
                                    <option value="<?= $row['id_customer'] ?>"> <?= $row["nama_customer"] ?> </option>
                            <?php } ?>
                        </select>
                        <Button type="submit" id="btn-submit" name="submit" style="background: rgb(51, 51, 51); color: white;">Pilih</Button>
                    </form>
                    <table>
                        <thead>
                            <th style="background: rgb(51, 51, 51)">Nama</th>
                            <th style="background: rgb(51, 51, 51)">Barang</th>
                            <th style="background: rgb(51, 51, 51)">Jumlah</th>
                            <th style="background: rgb(51, 51, 51)">Harga</th>
                            <th style="background: rgb(51, 51, 51)">Diskon</th>
                            <th style="background: rgb(51, 51, 51)">Ongkos Kirim</th>
                            <th style="background: rgb(51, 51, 51)">Total Harga</th>
                        </thead>
                        <tbody id="body-td"></tbody>
                    </table>
                </div>
            </div>
            <div class="menu">
                <h1>Registered Account</h1><hr>
                <ul>
                    <?php
                        while($row = mysqli_fetch_array($results)){?>
                            <li class="users"><?= $row[0] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </body>
    <script>
        $(document).ready(function(){  
            $(`#btn-submit`).click(function(e){
                var id = document.getElementById(`users2`).value;
                e.preventDefault();
                $.get("cariHistory.php", { submit : id }, function(hasil){
                    let data = JSON.parse(hasil);
                    while(document.getElementById(`body-td`).lastChild){
                        document.getElementById(`body-td`).removeChild(document.getElementById(`body-td`).lastChild);
                    }
                    for(let i = 0; i<data.length;i++){
                        $('#body-td').append(`
                            <tr>
                                <td> ${data[i]["nama_customer"]} </td>
                                <td> ${data[i]["nama_barang"]} </td>
                                <td> ${data[i]["jumlah"]} </td>
                                <td> ${data[i]["harga"]} </td>
                                <td> ${data[i]["diskon"]} </td>
                                <td> ${data[i]["ongkos_kirim"]} </td>
                                <td> ${data[i]["total_harga"]} </td>
                            </tr>
                        `);
                    }
                });
            });
        });
    </script>
</html>
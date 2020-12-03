<?php
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutfitLabs</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <script src="./assets/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/listBarang.css">
</head>

<body>
    <div class="header">
        <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
        <form action="admin.php" method="POST">
            <button type="submit" id="btnBack">Back</button>
        </form>
    </div>
    </div>
    <div class="outline">
        <h1 style="margin-bottom: 20px;">List Barang</h1>
        <form method="POST">
            <button type="hidden" id="btnn" formaction="tambah.php" style="display: none;"></button>
        </form>
        <form action="" method="POST">
            <table>
                <thead>
                    <th>ID_Barang</th>
                    <th>Nama_Barang</th>
                    <th>Jenis_Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                </thead>
                <tbody id="barang">
                    <?php
                    $result = mysqli_query($conn, "select * from barang");
                    while ($row = mysqli_fetch_array($result)) {
                        $barang = array(
                            'id' => $row["id_barang"],
                            'nama' => $row["nama_barang"],
                            'harga' => $row["harga"],
                            'stok' => $row["stok"],
                            'desc' => $row["deskripsi"],
                            'jenis' => $row["id_jenis"]
                        );
                        $data[] = $barang;
                    }
                    foreach ($data as $key => $val) {
                    ?>
                        <script>
                            $(document).ready(function() {
                                var id2 = <?= $key ?>;
                                $('#barang').append(`
                        <tr id=${id2} name="">
                            <td><?= $val['id'] ?></td>
                            <td><?= $val['nama'] ?></td>
                            <td><?= $val['jenis'] ?></td>
                            <td><?= $val['harga'] ?></td>
                            <td><?= $val['stok'] ?></td>
                            <td><?= $val['desc'] ?></td>
                        </tr>
                    `);

                                $(`#${id2}`).click(function() {
                                    var barang = <?= json_encode($val) ?>;
                                    document.getElementById(`${id2}`).setAttribute("name", "query");
                                    $.get("sendItem.php", {
                                        query: barang
                                    }, function() {
                                        document.getElementById("btnn").click();
                                    });
                                });
                            });
                        </script>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <div style="height: 26px;"></div>
</body>

</html>
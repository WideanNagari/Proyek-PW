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
    <link rel="stylesheet" href="css/listEvent.css">
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
            <button type="hidden" id="btnn" formaction="addevent.php" style="display: none;"></button>
        </form>
        <form action="" method="POST">
            <table>
                <thead>
                    <th>ID_Event</th>
                    <th>Nama_Event</th>
                    <th>Diskon</th>
                    <th>Diskon (%)</th>
                    <th>Status</th>
                </thead>
                <tbody id="barang">
                    <?php
                    $result = mysqli_query($conn, "select * from event");
                    while ($row = mysqli_fetch_array($result)) {
                        $event = array(
                            'id' => $row["id_event"],
                            'nama' => $row["nama_event"],
                            'diskon1' => $row["diskon"],
                            'diskon2' => $row["diskon (%)"],
                            'status' => $row["status"]
                        );
                        $data[] = $event;
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
                            <td><?= $val['diskon1'] ?></td>
                            <td><?= $val['diskon2'] ?></td>
                            <td><?= $val['status'] ?></td>
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
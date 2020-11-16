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
    <style>
        @font-face {
            font-family: "goodTimes";
            src: url('./assets/fonts/good_times_rg.ttf');
        }

        @font-face {
            font-family: "teen";
            src: url('./assets/fonts/teen.ttf');
        }
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: linear-gradient(120deg,lightcyan,lightskyblue,lightcyan);
        }
        .header{
            width: 100%;
            height: 60px;
            background: rgb(50, 50, 50);
            color: white;
            font-size: 20px;
            font-weight: 600;
            font-family: "goodTimes";           
        }
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        button{
            width:80px;
            font-family:"teen";
            background-color:lightgrey;
            height:30px;
            border-radius:7px;
            font-size:17px;
        }
        button:hover{
            cursor:pointer;
        }
        #btnBack{
            font-family:"goodTimes";
            border: 0px;
            font-size: 25px;
            background: rgb(50, 50, 50);
            float:left;
            margin-left:50%;
            margin-top:15px;
            color:white;
        }
        #btnBack:hover{
            color:lightskyblue;
            cursor:pointer;
        }
        .outline{
            font-family: "teen";
            width:80%;
            height:550px;
            margin:auto;
            margin-top: 40px;
            border:solid gray 3px;
            border-radius:20px;
            background-color:white;
            padding: 20px;
            overflow: auto;
        }
        tbody tr td{
            width: 150px;
            text-align: center;
        }
    </style>
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
    <h1 style="margin-bottom: 20px;">List User</h1>
    <form action="" method="POST">
        <table border=1>
        <thead>
            <th>ID_Customer</th>
            <th>Nama_Customer</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Provinsi</th>
            <th>Saldo</th>
            <th>Akses</th>
            <th>Ubah Akses</th>
        </thead>
        <tbody id="user">
            <?php
            $result = mysqli_query($conn, "select * from customer");
            while($row = mysqli_fetch_array($result)){
                $orang = array(
                    'id' => $row["id_customer"],
                    'nama' => $row["nama_customer"],
                    'email' => $row["email"],
                    'alamat' => $row["alamat"],
                    'saldo' => $row["saldo"],
                    'akses' => $row["akses"]
                );
                $idprov = $row["id_provinsi"];
                $result2 = mysqli_query($conn, "select * from provinsi where id_provinsi = '$idprov'");
                while($row2 = mysqli_fetch_array($result2)){
                    $orang['provinsi'] = $row2["nama_provinsi"];
                }
                $data[] = $orang;
            }
            foreach($data as $key => $val){
                $aksess = "";
                if($val['akses']=="1") $aksess = "Aktif";
                else $aksess = "Non-Aktif";
            ?>
            <script>
                $(document).ready(function(){
                    var id2 = <?= $key ?>;
                    var idTr = "t"+id2;
                    $('#user').append(`
                    <tr id=${idTr}>
                        <td><?= $val['id'] ?></td>
                        <td><?= $val['nama'] ?></td>
                        <td><?= $val['email'] ?></td>
                        <td><?= $val['alamat'] ?></td>
                        <td><?= $val['provinsi'] ?></td>
                        <td><?= $val['saldo'] ?></td>
                        <td><?= $aksess ?></td>
                        <td id=${id2} name=""><Button>Ubah</Button></td>
                    </tr>
                    `);
                    
                    $(`#${id2}`).click(function(){
                        var user = <?= json_encode($val)?>;
                        document.getElementById(`${id2}`).setAttribute("name","query");
                        $.get("gantiAkses.php", { query : user }, function(hasil){
                            document.getElementById(`${idTr}`).removeChild(document.getElementById(`${idTr}`).lastChild);
                            $(`#${idTr}`).append(`
                                <td>${hasil}</td>
                            `);
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
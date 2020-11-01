<?php
    require_once("connection.php");
    $tipe = "";
    $barang=[];
    if(isset($_GET["type"])){
        if($_GET["type"]=="clothes-men"){$tipe = "JB001";}
        else if($_GET["type"]=="clothes-woman"){$tipe = "JB002";}
        else if($_GET["type"]=="trousers-men"){$tipe = "JB003";}
        else if($_GET["type"]=="trousers-woman"){$tipe = "JB004";}
        else if($_GET["type"]=="jacket-men"){$tipe = "JB005";}
        else if($_GET["type"]=="bag-men"){$tipe = "JB006";}
        else if($_GET["type"]=="shoes-men"){$tipe = "JB007";}
        else if($_GET["type"]=="jacket-woman"){$tipe = "JB008";}
        else if($_GET["type"]=="bag-woman"){$tipe = "JB009";}
        else if($_GET["type"]=="shoes-woman"){$tipe = "JB010";}
        
        $result = mysqli_query($conn, "select * from barang where id_jenis='$tipe'");
        while($row = mysqli_fetch_array($result)){
            $brg = array(
                'id' => $row["id_barang"],
                'nama' => $row["nama_barang"],
                'harga' => $row["harga"],
                'stok' => $row["stok"],
                'deskripsi' => $row["deskripsi"],
                'id_jenis' => $row["id_jenis"]
            );
            $barang[] = $brg;
        }
    }
    if(isset($_POST["home"])){
        if(isset($_SESSION["user"])){
            header("location: user.php");
        }else{
            header("location: index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <style>
        @font-face {
            font-family: "goodTimes";
            src: url('./assets/fonts/good_times_rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('./assets/fonts/teen.ttf');
        }
        body{
            font-family: "teen";
            background: white;
            padding: 0;
            margin: 0;
        }
        #logo{
            font-family: "goodTimes";
            text-align: center;
            font-size: 30px;
            color: whitesmoke;
        }
        .menu{
            text-align: center;
        }

        .menu ul{
            padding: 0px;
        }
        .menu li, #btn{
            display: inline-block;
            font-family: "teen";
        }

        .menu a, #btn{
            color: lightsteelblue;
            text-decoration: none;
            font-weight: bold;
            padding: 0px 10px;
        }

        .menu a:hover, #btn:hover{
            border-bottom: 2px solid white;
            color: whitesmoke;
        }
        
        .product{
            text-align: center;
            margin-top: 40px;
        }

        .column img{
            width: 100%;
            height: 85%;
            margin-bottom: 10px;
            vertical-align: middle;
        }

        .content {
            position: relative;
            display: inline-flex;
            width: 30%;
            height: 60%;
            padding: 5px;
            margin-bottom: 50px;
        }

        .harga {
            position: absolute;
            bottom: 50;
            width: 95%;
            padding: 5px 5px 5px 5px;
            bottom: -25px;
        }

        .footer {
            background-color: rgb(13, 13, 13);
            text-align: center;
            font-size: 12px;
            padding-left: 20%;
            padding-right: 20%;
            height: 30%;
            color: whitesmoke;
        }

        .footer ul{
            list-style-type: none;
            text-align: left;
            font-size: 16px;
            margin: 0;
            margin-top: 250;
            padding: 0;
            padding-top: 5%;
        }

        .footer li a{
            display: block;
            width: 70px;
            color: lightsteelblue;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header" style="background-color: black;height: 80px;padding:20px 0px;">
        <div id="logo">OutfitLabs</div>
        <div class="menu">
            <ul>
                <li><a href="#ladies">LADIES</a></li>
                <li><a href="#men">MEN</a></li>
                <li><a href="#3">MENU 3</a></li>
                <li><a href="#4">MENU 4</a></li>
                <li><a href="#5">MENU 5</a></li>
                <li>
                    <form method="POST">                    
                        <button name="home" id="btn" style="
                        font-size:15px;
                        background-color: Transparent;
                        background-repeat:no-repeat;
                        border: none;
                        cursor:pointer;
                        overflow: hidden;
                        outline:none;">HOME</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <div class="product">
        <div class="column">
        </div>
    </div>
    <div class="footer">
        <div>
            <ul>
                <li style="color: white;">Shop</li>
                <li><a href="">Men</a></li>
                <li><a href="">Ladies</a></li>
            </ul>
            <br><br>
        </div>
        <div style="padding-bottom: 30px;">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam laborum quia voluptas minus sapiente odit illo odio at commodi ex quo mollitia sunt, ipsa ipsam ipsum tempore nam ad quisquam.Iste unde sunt consequatur voluptates mollitia laborum, at nemo totam, nam ipsam optio sit distinctio ratione assumenda repellendus corrupti sed eligendi pariatur ducimus? Ipsum, voluptate aspernatur adipisci quisquam tenetur perspiciatis!
        </div>
    </div>
    <form method="POST">
        <button type="hidden" id="btnn" formaction="display.php" style="display:none;"></button>
    </form>
</body>
    <script>
        var barang = <?= json_encode($barang)?>;
        $(document).ready(function(){
            for(let i = 0; i<barang.length; i++){
                var id = barang[i]["id"];
                var harga = barang[i]["harga"];
                var nama = barang[i]["nama"];
                $('.column').append(`
                    <div class="content" id=${i} name="">
                        <img src="./assets/pic/${id}.png" alt="">
                        <div class="harga">${harga} - ${nama}</div>
                    </div>
                `);
                $(`#${i}`).click(function(){
                    document.getElementById(`${i}`).setAttribute("name","query");
                    $.get("sendInfo.php", { query : barang[i] }, function(){
                        document.getElementById("btnn").click(); 
                    });
                });   
            }
        });
    </script>
</html>
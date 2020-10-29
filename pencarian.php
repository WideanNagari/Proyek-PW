<?php
    require_once("connection.php");
    
    if(isset($_POST["checkout"])){
        echo "<script>alert('Berhasil Beli!')</script>";
    }
    if(isset($_POST["back"])){
        setcookie("barang","",time()-1);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/pencarian.css">
</head>
<body>
    <div class="header">
        <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 160px;">OutfitLabs</div>
        <ul>
            <li>Clothes</li>
            <li>Trousers</li>
            <li>Jacket</li>
            <li>Bag</li>
            <li>Shoes</li>
            <li><form action="index.php" method="POST"><button type="submit" id="back">Back</button></form></li>
        </ul>
        <form id="cari">
            <input type="text" id="idQuery" name="query" placeholder=" Pencarian" style="width: 170px; height: 26px;">
            <button type="submit" id="btnCari" name="btnCari"  style="width: 50px; height: 30px; background-color: lightcyan;">Cari</button>
        </form>
    </div>
    <div class="pencarian">
        <p id="hasil">Hasil Pencarian: -</p>
        <div id="barang">
        </div>
    </div>
    <form method="POST">
        <button type="hidden" id="btnn" formaction="display.php" style="position: absolute;"></button>
    </form>
</body>
    <script>
        var hasil2;
        $(document).ready(function(){
            $("#cari").submit(function(e){
                e.preventDefault();
                document.getElementById("hasil").innerText = "Hasil Pencarian: " + $("#idQuery").val();
                $.getJSON("cari.php", { btnCari : "aaa" , query : $("#idQuery").val() }, function(hasil){
                    hasil2 = hasil;
                    while (document.getElementById("barang").firstChild) {
                        document.getElementById("barang").removeChild(document.getElementById("barang").firstChild);
                    }
                    var jum = hasil2.length;
                    $('#barang').append(`
                        <p style='font-size: 20px;margin-bottom: 20px;'>${jum} barang ditemukan.</p>
                    `);
                    for(let i = 0; i<hasil2.length; i++){
                        $('#barang').append(`
                            <div id="${i}" name="" class="barang2">
                                <img src="./assets/pic/${hasil2[i]["id"]}.png" alt="">
                                <p>${hasil2[i]["nama"]}</p>
                                <p>Rp. ${hasil2[i]["harga"]}</p>
                            </div>
                        `);
                        $(`#${i}`).click(function(){
                            document.getElementById(`${i}`).setAttribute("name","query");
                            e.preventDefault();
                            $.get("sendInfo.php", { query : hasil2[i] }, function(){
                                document.getElementById("btnn").click();
                                
                            });
                        });   
                    }
                });
            });
        });
    </script>
</html>
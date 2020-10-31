<?php
    require_once("connection.php");
    $mybag = [];
    if(isset($_COOKIE["mybag"])){
        $mybag = json_decode($_COOKIE["mybag"],true);
    }
    if(isset($_POST["hapus"])){
        setcookie("mybag","",time()-1);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./assets/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./css/myBag.css">
</head>
<body>
    <div class="header">
        <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
        <ul>
            <li>Clothes</li>
            <li>Trousers</li>
            <li>Jacket</li>
            <li>Bag</li>
            <li>Shoes</li>
            <li><form action="" method="POST"><button type="submit" id="back">Back</button></form></li>
        </ul>
        <div id="judul">MyBag</div>
    </div>
    <div class="checkout">
        <div class="barang" id="brg">
            <div>
                <div class="titlee" style="width:450px;">Item</div>
                <div class="titlee" style="width:300px;">Price</div>
                <div class="titlee">Quantity</div>
                <div class="titlee" style="margin-right:0;">Remove</div>
            </div>
        </div>
        <div class="last2" id="jumlah">Jumlah Item: 10</div>
        <div class="last2" id="harga">Harga: Rp. 10000000</div>
        <form method="POST">
            <?php //buat cookie untuk menampung barang yang dibeli?>
            <button class="last2" id="tombol" name="checkout" formaction="checkout.php" style="font-family: 'teen';">Checkout</button>
        </form>
        <form method="POST">
            <button type="hidden" name="hapus" id="btnn" style="display:none;"></button>
        </form>
    </div>
    <div style="height: 24px;"></div>
</body>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57)){return false;}
        else{return true;}
    }
    function gantiJumlah(value,id){
        mybag[id]["jumlah"] = value;
        var total = 0;
        var idd = id;
        for(let i = 0; i<mybag.length; i++){
            total+=(Number(mybag[i]["harga"])*mybag[i]["jumlah"]);
        }
        document.getElementById("harga").innerText = "Harga: Rp. "+total;
        document.getElementById(id).setAttribute("name","query2");
        $.get("sendInfo.php", { query2 : mybag }, function(){});
    }
    function inputJumlah(value,max,id){
        if(Number(value)>Number(max)){
            document.getElementById(id).value = max;
        }
        gantiJumlah(value,id);
    }
    var mybag = <?= json_encode($mybag) ?>;
    $(document).ready(function(){
        var total = 0;
        for(let i = 0; i<mybag.length; i++){
            total+=(Number(mybag[i]["harga"])*mybag[i]["jumlah"]);
        }
        document.getElementById("jumlah").innerText = "Jumlah Item: "+mybag.length;
        document.getElementById("harga").innerText = "Harga: Rp. "+total;
        for(let i = 0; i<mybag.length; i++){
            var id = mybag[i]["id"];
            var harga = mybag[i]["harga"];
            var nama = mybag[i]["nama"];
            var max = mybag[i]["stok"];
            var jumlah = mybag[i]["jumlah"];
            $('.barang').append(`
                <div class="barang2" id="ke${i}">
                    <div class="isi" style="width:450px;">${nama}</div>
                    <div class="isi" style="width:300px;">Rp. ${harga}</div>
                    <input type="number" name="" id="${i}" value="${jumlah}" min="1" max="${max}" oninput="inputJumlah(value,max,id)" onchange="gantiJumlah(value,id)" class="isi" style="width:125px;height:20px;border:2px solid black;position:relative; bottom: 3px;">
                    <div class="isi" style="margin-right:0;"><button id=remove${i} name="" style="width:115px;height:23px;border:2px solid black;position:relative; bottom: 3px;">Remove</button></div>
                </div>
            `);
            document.getElementById(`remove${i}`).setAttribute("nomor",id);
            $(`#remove${i}`).click(function(){
                var j;
                for(let ii = 0; ii<mybag.length; ii++){
                    if(mybag[ii]["id"]==document.getElementById(`remove${i}`).getAttribute("nomor")){
                        j=ii;
                    }
                }
                mybag.splice(j,1);
                
                var total = 0;
                for(let i = 0; i<mybag.length; i++){
                    total+=(Number(mybag[i]["harga"])*mybag[i]["jumlah"]);
                }
                document.getElementById("harga").innerText = "Harga: Rp. "+total;
                if(mybag.length>0){
                    document.getElementById(`remove${i}`).setAttribute("name","query2");
                    $.get("sendInfo.php", { query2 : mybag }, function(){});
                    document.getElementById("brg").removeChild(document.getElementById(`ke${i}`));
                }else{
                    document.getElementById(`remove${i}`).setAttribute("name","query3");
                    $.get("sendInfo.php", { query3 : "" }, function(){
                        document.getElementById("brg").removeChild(document.getElementById(`ke${i}`));
                        document.getElementById("btnn").click(); 
                    });
                    
                }
            });   
        }
    });
</script>
</html>
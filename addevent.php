<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OutfitLabs</title>   
    <script src="jquery-3.5.1.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <style>
        @font-face {
            font-family: "goodTimes";
            src: url('good\ times\ rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('teen.ttf');
        }
        body{
            margin:0;
            background-color:lightskyblue;
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
        .outline{
            width:50%;
            height:4        70px;
            margin-left:25%;
            margin-top:3%;
            border:solid gray 3px;
            border-radius:20px;
            background-color:white;
        }
        input{
            background-color:lightgrey;
            width:300px;
            height:23px;
        }
        input[type="radio"]{
            width:auto;
            margin-left:10px;
            margin-top:0;
        }
        .contain{
            width:90%;
            margin-left:25px;
            margin-right:20px;
            height:90%;
            margin-top:5%;
            margin-bottom:3%;
            padding-bottom:3%;
            border:3px solid gray;
            border-radius:20px;
            background-color:white;
            font-family:"teen";
            padding-left:20px;
        }
        .header div:hover{
            color:lightskyblue;
            cursor:pointer;
        }
        .link{
            float:left;
            margin-left:50%;
            margin-top:15px;
        }
        button{
            width:80px;
            font-family:"teen";
            background-color:lightgrey;
            height:30px;
            margin-left:10%;
            border-radius:7px;
            font-size:17px;
        }
        button:hover{
            cursor:pointer;
        }
        

    </style>
</head>
<body>
<a href=""></a>
<div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;" href="index.php">OutfitLabs</div>
    <div class="link">
    <form action="" method="POST">Account</form>
    </div>
</div>
</div>
<div class="outline">
    <div class="contain">
        <form action="" method="POST">
            <h1>Tambah Event</h1>
            ID Event  <input type="text" name="id_event" style="margin-left:50px;"><br> <br>           
            Nama Event  <input type="text" name="nama_event" style="margin-left:18px;"><br><br>
            Diskon  <input type="text" name="diskon" style="margin-left:60.5px;"><br><br>
            Diskon %  <span>
            <input type="text" name= "diskon_percentage" style="margin-left:45px;">
            </span>
            <span class= style="width=10%;">%</span>
            <br><br>
            Status <input type="radio" name="status" id="aktif">Aktif 
            <input type="radio" name="status" id="non-aktif"> Non Aktif
            <br> <br>
            <button type="submit" style="display:none;">Edit</button>
            
            <button type="submit">Tambah</button>
        </form>
    </div>
</div>

</body>
</html>
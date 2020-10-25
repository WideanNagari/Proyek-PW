<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        @font-face {
            font-family: "goodTimes";
            src: url('good\ times\ rg.ttf');
        }
        @font-face {
            font-family: "teen";
            src: url('teen.ttf');
        }
        .header{
            width: 100%;
            height: 60px;
            background: rgb(50, 50, 50);
            color: white;
            font-size: 20px;
            font-weight: 600;
            font-family: "teen";
        }
        #logo{
            font-size: 30px;
            font-family: "goodTimes";
            float: left;
        }
        .divform{
            font-family: "teen";
            color: rgb(38, 38, 38);
            text-align: center;
            padding: 40px 0px;
            font-weight: bold;
        }

        input[type=text]{
            font-family: "teen";
            border: 0px;; 
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 60px;
            width: 20%;
        }

        input[type=password]{
            font-family: "teen";
            border: 0px; 
            color: #403866;
            line-height: 1.2;
            font-size: 18px;
            background: lightgrey;
            height: 60px;
            width: 20%;
        }

        input[type=button]{
            font-family: "teen";
            color: white;
            border: 0px;
            line-height: 1.2;
            font-size: 18px;
            background: rgb(50, 50, 50);
            height: 60px;
            width: 20%;
        }
        
        input[type=button]:hover{
            font-family: "teen";
            color: rgb(50, 50, 50);
            border: 0px;
            line-height: 1.2;
            font-size: 18px;
            background: white;
            border: 2px solid black;
            height: 60px;
            width: 20%;
        }

        .divform a{
            color: grey;
            text-decoration: none;
        }

        .divform a:hover{
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
    <div id="logo" style="padding-left: 110px; padding-top: 10px; margin-right: 170px;">OutfitLabs</div>
    </div>
    <div class="divform">
        <form method="post">
            <h1>Login</h1><br>
            <input type="text" name="username" placeholder="  username"><br><br>
            <input type="password" name="password" placeholder="  password"><br><br>
            <input type="checkbox" name="remember"> Remember me<br><br>
            <input type="button" value="Login"><br><br>
            <a href="register.php">Baru di OutfitLabs ? Daftar di sini</a>
        </form>
    </div>
</body>
</html>
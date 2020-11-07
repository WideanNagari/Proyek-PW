<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    $conn = mysqli_connect("localhost", "root", "", "outfitlabs");
    $user_login=null;
    if(isset($_SESSION["user"])){
        $user_login = $_SESSION["user"];
    }
?>
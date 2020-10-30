<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "outfitlabs");
    $user_login=null;
    if(isset($_SESSION["user"])){
        $user_login = $_SESSION["user"];
    }
?>
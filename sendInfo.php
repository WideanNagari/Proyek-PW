<?php
    require_once("connection.php");
    if(isset($_REQUEST["query"])){
        $barang = $_REQUEST["query"];
        setcookie("barang",json_encode($barang),time()+60*10);
    }else{
        header("location: pencarian.php");
    }
?>
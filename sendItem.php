<?php
    require_once("connection.php");
    if(isset($_REQUEST["query"])){
        $item = $_REQUEST["query"];
        setcookie("item",json_encode($item),time()+60*10);
    }else{
        header("location: index.php");
    }
?>
<?php
    require_once("connection.php");
    if(isset($_REQUEST["query"])){
        $user = $_REQUEST["query"];
        $idd = $user["id"];
        $akses = $user["akses"];
        if($akses==1){
            $akses = 0;
        }else{
            $akses = 1;
        }
        mysqli_query($conn, "update customer set akses = '$akses' where id_customer = '$idd'");
        echo $akses;
    }else{
        header("location: index.php");
    }
?>
<?php
    require_once("connection.php");
    if(isset($_REQUEST["query"])){
        $barang = $_REQUEST["query"];

        $idd = $barang["id_jenis"];
        $result = mysqli_query($conn, "select * from jenis_barang where id_jenis = '$idd'");
        $jenis = "a";
        while($row = mysqli_fetch_array($result)){
            $jenis = $row["nama_jenis"];
        }
        $barang["nama_jenis"] = $jenis;
        setcookie("barang",json_encode($barang),time()+60*10);
    }else{
        header("location: index.php");
    }
?>
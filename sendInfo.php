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
    }else if(isset($_REQUEST["query2"])){
        mysqli_query($conn,"UPDATE `mybag` SET jumlah = $_REQUEST[jml] WHERE `id` = '$_REQUEST[query2]'");
        $barang = mysqli_query($conn, "SELECT * FROM mybag m, barang b WHERE `id_user` = '$_REQUEST[id]' and m.id_barang = b.id_barang");
        $arrb = [];
        while($row = mysqli_fetch_array($barang)){
            $ar = array(
                'jumlah' => $row["jumlah"],
                'harga' => $row["harga"]
            );
            $arrb[] = $ar;
        }
        echo json_encode($arrb);
    }else if(isset($_REQUEST["query3"])){
        setcookie("mybag","",time()-1);
    }else{
        header("location: index.php");
    }
?>
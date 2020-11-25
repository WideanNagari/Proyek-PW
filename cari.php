<?php
    require_once("connection.php");
    if(isset($_REQUEST["btnCari"])){
        $result = null;
        $result2 = null;
        $barang = [];
        if(isset($_REQUEST["btnCari"])){
            $result = mysqli_query($conn, "select * from barang where nama_barang like '%" . $_REQUEST["query"] . "%'");
        }else{
            $result = mysqli_query($conn, "select * from barang");
        }
        while($row = mysqli_fetch_array($result)){
            $brg = array(
                'id' => $row["id_barang"],
                'nama' => $row["nama_barang"],
                'harga' => $row["harga"],
                'stok' => $row["stok"],
                'deskripsi' => $row["deskripsi"],
                'id_jenis' => $row["id_jenis"],
                'path' => $row["path"],
                'view' => $row["view"]
            );
            $barang[] = $brg;
        }
        
        echo json_encode($barang);
    }else{
        header("location: index.php");
    }
?>
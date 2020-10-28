<?php
    require_once("connection.php");
    if(isset($_REQUEST["btnCari"])){
        $result = null;
        if(isset($_REQUEST["btnCari"])){
            $result = mysqli_query($conn, "select * from barang where nama_barang like '%" . $_REQUEST["query"] . "%'");
        }else{
            $result = mysqli_query($conn, "select * from barang");
        }
        $jumlah = mysqli_num_rows($result);
        echo "<p style='font-size: 20px;'>";
        echo $jumlah;
        echo " barang ditemukan.</p>";
        echo "<ul>";
        while($row = mysqli_fetch_array($result)){
            echo "<li>" . $row["id_barang"] . " - " . $row["nama_barang"] . " - " . $row["harga"] . " - " . $row["stok"] . "</li>";
        }
        echo "</ul>";
    }else{
        header("location: pencarian.php");
    }
?>
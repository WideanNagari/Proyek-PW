<?php
    require_once("connection.php");
    if(isset($_GET['submit'])){
        if($_GET['submit']=="All"){
            $data = mysqli_query($conn, "SELECT c.nama_customer, b.nama_barang, t.jumlah, t.harga, t.diskon, t.ongkos_kirim, t.total_harga FROM transaksi t INNER JOIN customer c ON t.id_customer=c.id_customer JOIN barang b ON b.id_barang = t.id_barang")->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        }else{
            $data = mysqli_query($conn, "SELECT c.nama_customer, b.nama_barang, t.jumlah, t.harga, t.diskon, t.ongkos_kirim, t.total_harga FROM transaksi t INNER JOIN customer c ON t.id_customer=c.id_customer AND c.id_customer = '$_GET[submit]' JOIN barang b ON b.id_barang = t.id_barang")->fetch_all(MYSQLI_ASSOC);
            echo json_encode($data);
        }
    }else{
        header("location: index.php");
    }
?>
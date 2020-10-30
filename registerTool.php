<?php
    require_once("connection.php");
    if(isset($_POST["daftar"])){
        if($_POST["password"]!=$_POST["confirmpassword"]){
            header("location: register.php?error=1");
        }else{
            $username = $_POST["username"];
            $result = mysqli_query($conn, "select * from customer");
            $ada = false;
            while($row = mysqli_fetch_array($result)){
                if($username==$row["nama_customer"]){
                    $ada = true;
                }
            }
            if($ada){
                header("location: register.php?error=2");
            }else{
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $email = $_POST["email"];
                $alamat = $_POST["alamat"];
                $provinsi = $_POST["provinsi"];
                $id = "CU";

                $result = mysqli_query($conn, "select * from customer");
                $jumlah = mysqli_num_rows($result);
                $jumlah+=1;
                if($jumlah<10){
                    $id = $id . "00" . $jumlah;
                }else if($jumlah<100){
                    $id = $id . "0" . $jumlah;
                }else{
                    $id = $id . $jumlah;
                }
                
                mysqli_query($conn, "insert into customer values('$id','$username','$password','$email','$alamat','$provinsi','0','1')");
                header("location: login.php?success=1");
            }
        }
    }else{
        header("location: index.php");
    }
?>
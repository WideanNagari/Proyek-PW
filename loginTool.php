<?php
    require_once("connection.php");
    if(isset($_POST["login"])){
        if($_POST["username"]=="admin" && $_POST["password"]=="admin"){
            header("location: admin.php");
        }else{
            $username = $_POST["username"];
            $result = mysqli_query($conn, "select * from customer where nama_customer='$username'");
            $password = "";
            $akses = "";
            $ada=false;
            $user=[];
            while($row = mysqli_fetch_array($result)){
                $password = $row["password"];
                $akses = $row["akses"];
                $ada = true;
                $user = array(
                    'id' => $row["id_customer"],
                    'nama' => $row["nama_customer"],
                    'email' => $row["email"],
                    'alamat' => $row["alamat"],
                    'saldo' => $row["saldo"],
                    'akses' => $akses,
                    'provinsi' => $row["id_provinsi"]
                );
            }
            if($ada!=true){
                header("location: login.php?error=1");
            }else{
                if($akses==0){
                    header("location: login.php?error=3");
                }else{
                    if(password_verify($_POST["password"],$password)){
                        if(isset($_POST["remember"])){
                            //buat cookie remember me
                        }
                        $_SESSION["user"] = $user;
                        header("location: index.php");
                    }else{
                        header("location: login.php?error=2");
                    }
                }
            }
        }
    }else{
        header("location: login.php");
    }
?>
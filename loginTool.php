<?php
    require_once("connection.php");
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $result = mysqli_query($conn, "select password from customer where nama_customer='$username'");
        $password = "";
        $ada=false;
        while($row = mysqli_fetch_array($result)){
            $password = $row["password"];
            $ada = true;
        }
        if($ada!=true){
            header("location: login.php?error=1");
        }else{
            if(password_verify($_POST["password"],$password)){
                if(isset($_POST["remember"]){
                    //buat cookie remember me
                }
                header("location: index.php");
            }else{
                header("location: login.php?error=2");
            }
        }
    }else{
        header("location: login.php");
    }
?>
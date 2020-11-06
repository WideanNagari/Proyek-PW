<?php
    require_once("connection.php");
    if(isset($_POST['logOut'])) {
        unset($_SESSION["user"]);
        setcookie("userLog","",time()-1);  
        header("location: index.php");
    }
?>
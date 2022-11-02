<?php
    session_start();
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    if($username=="admin" AND $password=="12345"){
        $_SESSION["username"]=$username;
        header("location:halaman_admin.php");
    }else{
        header("location:login.php?login_error");
    }
?>
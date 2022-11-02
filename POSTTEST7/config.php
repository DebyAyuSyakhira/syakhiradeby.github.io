<?php
    
    $conn = mysqli_connect("localhost", "root", "", "login");

    if(!$conn)
    {
        echo "Koneksi ke MySQL Gagal... ";
    }
?>

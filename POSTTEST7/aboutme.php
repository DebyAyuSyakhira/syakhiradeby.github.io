<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO BUAH DHARMASRAYA</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>   
</head>
<body>
    <nav class="header">
        <ul>
            <div class="header-text">
                <a href="#">Toko Buah Dharmasraya</a></li>
            </div>
            <li><a href="halaman_user.php">Home</a></li>
            <li><a href="produk.php">Product</a></li>
            <li><a href="aboutme.php">Aboutme</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li>
                <a href="#" class="tampilan">
                <button class="tombol-terang" onclick="ubahwarna()">Lightmode</button>
                <button class="tombol-gelap" onclick="ubahwarna()">Darkmode</button></a>
            </li>
            <script src="javascript.js"></script>
        </ul>
    </nav>
    <div class="aboutme">
        <center>
            <h1>Deby Ayu Syakhira</h1>
            <h2>Informatika B 2021</h2>
        </center>
        <div class="image">
            <center>
                <img src="img/me.png" alt="image">
            </center>
        </div>
        <center>
            <button id="info"> Click untuk melihat Biodata</button>
            <p id="biodata" style="display:none;">
                <br>Perkenalkan saya Deby Ayu Syakhira dengan NIM 2109106060 
                <br>dari kelas B Informatika 2021.Sekarang saya berada di semester 3.
                <br> Punya banyak hobi,seperti Masak, Berenang, Bersepeda, dan masih banyak lagi.
            </p>
            <script src="javascript.js"></script>
        </center>
    </div>
    <footer>
        <p>Terimakasih Telah Mengunjungi Toko Kami</p>
        <p>Jangan lupa untuk Berbelanja lagi di Toko Dharmasraya
        <br>Contact US</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <img alt="kaki-logo" class="kaki-logo" src="img/logo.png"> 
    </footer>
</body>
</html>
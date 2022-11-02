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
    <section class="bagian">
        <div class="container">
            <div class="bagian-left">
                <img src="img/buahhome.png">
                <h2>Selamat Datang<br>
                    Di Toko Buah Dharmasraya</h2>
                <p>Menjual Aneka Buah-Buahan dan di petik dari perkebunan pilihan</p>
                <script src="javascript.js"></script>
                <a href="produk.php"><button class="kotak">Product</button></a>
                
            </div>
        </div>
        <div class="penilaian">
            <div class="penilaian-text ">
                <p>Apa yang mereka katakan tentang kami...</p>
            </div>        
            <div class="penilaian-kolom">
                <div class="penilaian-1">
                    <img src="img/person.png">
                    <div>
                        <h3>Konsumen</h3>
                        <p>Barang Ori dan berkualitas. OTW beli lagi...</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
     
                <div class="penilaian-2">
                    <img src="img/person.png">
                    <div>
                        <h3>Konsumen</h3>
                        <p>Ongkir murah karena dekat rumah...</p>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <script src="javascript.js"></script>
    </section>
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